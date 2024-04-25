<?php

require_once("Conexion.php");
require_once("Cliente.php");
require_once("Producto.php");

class Factura
{
    private $db;

    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    public function generarFactura($cliente, $productos_seleccionados, $cantidad)
    {
        $descuento = 0;
        $valor_total = 0;

        $producto = new Producto();

        foreach ($productos_seleccionados as $key => $id_producto) {
            $stmt = $this->db->prepare("SELECT precio FROM articulos WHERE id = :id");
            $stmt->bindParam(":id", $id_producto);
            $stmt->execute();
            $producto = $stmt->fetch(PDO::FETCH_ASSOC);
            $valor_total += $cantidad[$key] * $producto["precio"];
        }

        if ($valor_total > 200000) {
            $descuento = 10;
        } elseif ($valor_total > 100000) {
            $descuento = 5;
        }

        // Aplicar descuento
        $valor_descuento = $valor_total * ($descuento / 100);
        $total_pagar = $valor_total - $valor_descuento;

        // Insertar cliente
        $stmt = $this->db->prepare("INSERT INTO clientes (nombreCompleto, tipoDocumento, numeroDocumento, telefono, email) 
                                    VALUES (:nombre, :tipo_documento, :numero_documento, :telefono, :email)
                                    ON DUPLICATE KEY UPDATE 
                                    nombreCompleto = VALUES(nombreCompleto), tipoDocumento = VALUES(tipoDocumento), 
                                    numeroDocumento = VALUES(numeroDocumento), telefono = VALUES(telefono), 
                                    email = VALUES(email)");
        $stmt->bindParam(":nombre", $cliente->nombre);
        $stmt->bindParam(":tipo_documento", $cliente->tipo_documento);
        $stmt->bindParam(":numero_documento", $cliente->numero_documento);
        $stmt->bindParam(":telefono", $cliente->telefono);
        $stmt->bindParam(":email", $cliente->email);
        $stmt->execute();
        $cliente_id = $this->db->lastInsertId();

        // Insertar factura
        $stmt = $this->db->prepare("INSERT INTO facturas (fecha, idCliente, estado, descuento, total) 
                                    VALUES (NOW(), :idCliente, 'Pagada', :descuento, :total)");
        $stmt->bindParam(":idCliente", $cliente_id);
        $stmt->bindParam(":descuento", $descuento);
        $stmt->bindParam(":total", $total_pagar);
        $stmt->execute();
        $factura_id = $this->db->lastInsertId();

        // Insertar detalle de factura
        foreach ($productos_seleccionados as $key => $id_producto) {
            $stmt = $this->db->prepare("INSERT INTO detalleFacturas (cantidad, precioUnitario, idArticulo, refenciaFactura) 
                                        VALUES (:cantidad, :precio_unitario, :id_articulo, :refencia_factura)");
            $stmt->bindParam(":cantidad", $cantidad[$key]);
            $stmt->bindParam(":precio_unitario", $producto["precio"]);
            $stmt->bindParam(":id_articulo", $id_producto);
            $stmt->bindParam(":refencia_factura", $factura_id);
            $stmt->execute();
        }
    }

    public function consultarFacturas()
    {
        $stmt = $this->db->query("SELECT refencia, fecha, estado FROM facturas");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function consultarFactura($refencia)
    {
        $stmt = $this->db->prepare("SELECT f.refencia as numero_referencia, f.fecha as fecha_compra, f.estado, 
                                    c.nombreCompleto as nombre_cliente, c.tipoDocumento, c.numeroDocumento, c.telefono, c.email,
                                    f.descuento, f.total, d.cantidad, d.precioUnitario as precio, d.valor_total
                                    FROM facturas f
                                    INNER JOIN clientes c ON f.idCliente = c.id
                                    INNER JOIN detalleFacturas d ON f.refencia = d.refenciaFactura
                                    WHERE f.refencia = :refencia");
        $stmt->bindParam(":refencia", $refencia);
        $stmt->execute();
        $detalle = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $factura = array(
            'numero_referencia' => $detalle[0]['numero_referencia'],
            'fecha_compra' => $detalle[0]['fecha_compra'],
            'estado' => $detalle[0]['estado'],
            'nombre_cliente' => $detalle[0]['nombre_cliente'],
            'tipo_documento' => $detalle[0]['tipoDocumento'],
            'numero_documento' => $detalle[0]['numeroDocumento'],
            'telefono' => $detalle[0]['telefono'],
            'email' => $detalle[0]['email'],
            'descuento' => $detalle[0]['descuento'],
            'total' => $detalle[0]['total'],
            'productos' => array()
        );

        foreach ($detalle as $producto) {
            array_push($factura['productos'], array(
                'nombre' => $producto['nombre'],
                'cantidad' => $producto['cantidad'],
                'precio' => $producto['precio'],
                'valor_total' => $producto['valor_total']
            ));
        }

        return $factura;
    }
}
?>
