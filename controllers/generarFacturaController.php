<?php
require_once("../models/Factura.php");
require_once("../models/Cliente.php");

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = new Cliente();
    $cliente->setNombre($_POST['nombre']);
    $cliente->setTipoDocumento($_POST['tipo_documento']);
    $cliente->setNumeroDocumento($_POST['numero_documento']);
    $cliente->setEmail($_POST['email']);
    $cliente->setTelefono($_POST['telefono']);

    $productos_seleccionados = $_POST['productos'];
    $cantidad = $_POST['cantidad'];

    $factura = new Factura();
    $factura->generarFactura($cliente, $productos_seleccionados, $cantidad);
    header("Location: consultar_facturas.php");
}
?>
