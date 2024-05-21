<?php
session_start();

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'auth';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

require_once 'controllers/' . ucfirst($controller) . 'Controller.php';

$controllerName = ucfirst($controller) . 'Controller';
$controllerInstance = new $controllerName();

$controllerInstance->$action();
?>
