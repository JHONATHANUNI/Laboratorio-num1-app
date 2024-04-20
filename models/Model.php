<?php
namespace App\models;

use App\controllers\ConexionDBController;

class Contacto extends ConexionDBController
{
    public function generarFactura($nombre, $tipo_documento, $numero_documento, $telefono, $email, $producto_id, $cantidad)
    {
        $conexion = $this->conectar();

        // Obtener información del producto
        $sql_producto = "SELECT * FROM articulos WHERE aid = ?";
        $stmt_producto = $conexion->prepare($sql_producto);
        $stmt_producto->bind_param("i", $producto_id);
        $stmt_producto->execute();
        $result_producto = $stmt_producto->get_result();
        $producto = $result_producto->fetch_assoc();
        $stmt_producto->close();

        // Calcular el precio y el descuento
        $precio = $producto['precioUnitario'] * $cantidad;
        $descuento = 0;
        if ($precio > 200000) {
            $descuento = 10;
        } elseif ($precio > 100000) {
            $descuento = 5;
        }

        // Insertar cliente si no existe
        $sql_cliente = "INSERT INTO clientes (nombreCompleto, tipoDocumento, numeroDocumento, email, telefono)
                        VALUES (?, ?, ?, ?, ?)
                        ON DUPLICATE KEY UPDATE nombreCompleto = VALUES(nombreCompleto), tipoDocumento = VALUES(tipoDocumento), numeroDocumento = VALUES(numeroDocumento), email = VALUES(email), telefono = VALUES(telefono)";
        $stmt_cliente = $conexion->prepare($sql_cliente);
        $stmt_cliente->bind_param("sssss", $nombre, $tipo_documento, $numero_documento, $email, $telefono);
        $stmt_cliente->execute();
        $cliente_id = $conexion->insert_id;
        $stmt_cliente->close();

        // Insertar factura
        $referencia = $this->generarReferencia();
        $fecha = date('Y-m-d H:i:s');
        $sql_factura = "INSERT INTO facturas (referencia, fecha, idCliente, estado, descuento)
                        VALUES (?, ?, ?, 'Pagada', ?)";
        $stmt_factura = $conexion->prepare($sql_factura);
        $stmt_factura->bind_param("ssii", $referencia, $fecha, $cliente_id, $descuento);
        $stmt_factura->execute();
        $factura_id = $conexion->insert_id;
        $stmt_factura->close();

        // Insertar detalle de factura
        $sql_detalle = "INSERT INTO detalleFacturas (idFactura, idArticulo, cantidad, precioUnitario, precio)
                        VALUES (?, ?, ?, ?, ?)";
        $stmt_detalle = $conexion->prepare($sql_detalle);
        $stmt_detalle->bind_param("iiidd", $factura_id, $producto_id, $cantidad, $producto['precioUnitario'], $precio);
        $stmt_detalle->execute();
        $stmt_detalle->close();

        $conexion->close();
        echo "Factura generada exitosamente.";
    }

    private function generarReferencia()
    {
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $ref_length = 10;
        $ref = "";
        for ($i = 0; $i < $ref_length; $i++) {
            $ref .= $chars[mt_rand(0, strlen($chars)-1)];
        }
        return $ref;
    }

    public function consultarFacturas()
    {
        $conexion = $this->conectar();
        $sql = "SELECT f.referencia, f.fecha, f.estado, c.nombreCompleto as nombre, c.numeroDocumento, c.telefono, c.email,
                SUM(d.precio) as total
                FROM facturas f
                JOIN clientes c ON f.idCliente = c.id
                LEFT JOIN detalleFacturas d ON f.id = d.idFactura
                GROUP BY f.referencia";
        $result = $conexion->query($sql);
        $facturas = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $facturas[] = $row;
            }
        }
        $conexion->close();
        return $facturas;
    }

    public function listarProductos()
    {
        $conexion = $this->conectar();
        $sql = "SELECT * FROM articulos";
        $result = $conexion->query($sql);
        $productos = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $productos[] = $row;
            }
        }
        $conexion->close();
        return $productos;
    }
}
?>
