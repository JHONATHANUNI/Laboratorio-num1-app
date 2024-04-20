<?php
session_start();

if(!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

require_once 'app/controllers/ConexionDBController.php';
require_once 'app/models/Contacto.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $tipo_documento = $_POST['tipo_documento'];
    $numero_documento = $_POST['numero_documento'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $producto_id = $_POST['producto'];
    $cantidad = $_POST['cantidad'];

    $contacto = new Contacto();
    $contacto->generarFactura($nombre, $tipo_documento, $numero_documento, $telefono, $email, $producto_id, $cantidad);
}
?>

