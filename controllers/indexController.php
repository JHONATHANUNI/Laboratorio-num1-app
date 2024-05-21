<?php
require_once("../models/Usuario.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $usuarioObj = new Usuario();

    if ($usuarioObj->iniciarSesion($usuario, $contraseña)) {
        $_SESSION['usuario'] = $usuario;
        header("Location: ../views/generar_factura.php");
    } else {
        $error = "Usuario o contraseña incorrectos.";
        include "../views/index.php";
    }
}
?>
