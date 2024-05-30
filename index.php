<?php
session_start();

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'auth';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

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

