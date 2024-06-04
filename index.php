<?php
session_start();

// Verificar si el usuario no está autenticado y redirigir al login si es necesario
if (!isset($_SESSION['user']) && (!isset($_GET['controller']) || $_GET['controller'] !== 'auth' || $_GET['action'] !== 'login')) {
    header('Location: index.php?controller=auth&action=login');
    exit();
}

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerFile = 'controllers/' . ucfirst($controller) . 'Controller.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;

    $controllerName = ucfirst($controller) . 'Controller';
    if (class_exists($controllerName)) {
        $controllerInstance = new $controllerName();

        if (method_exists($controllerInstance, $action)) {
            $controllerInstance->$action();
        } else {
            echo "Acción no reconocida.";
        }
    } else {
        echo "Controlador no reconocido.";
    }
} else {
    echo "Archivo de controlador no encontrado.";
}
?>
