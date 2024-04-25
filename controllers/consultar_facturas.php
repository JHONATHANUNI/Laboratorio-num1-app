<?php
require_once("../models/Factura.php");

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$factura = new Factura();
$facturas = $factura->consultarFacturas();

include "../views/consultar_facturas.php";
?>
