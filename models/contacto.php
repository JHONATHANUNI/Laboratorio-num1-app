<?php
require_once 'database/ConexionBDController.php';

class Contacto extends ConexionBDController {
    public function generarFactura($producto, $precio) {
        $conexion = $this->conectar();
        $sql = "INSERT INTO facturas (producto, precio) VALUES (?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sd", $producto, $precio);
        $stmt->execute();
        $stmt->close();
        $conexion->close();
        echo "Factura generada exitosamente.";
    }
}
?>
