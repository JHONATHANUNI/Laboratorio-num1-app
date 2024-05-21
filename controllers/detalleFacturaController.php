<?php
require_once("../models/Factura.php");

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

if (!isset($_GET['refencia'])) {
    header("Location: consultar_facturas.php");
    exit();
}

$factura = new Factura();
$detalle = $factura->consultarFactura($_GET['refencia']);

include "../views/detalle_factura.php";
?>
