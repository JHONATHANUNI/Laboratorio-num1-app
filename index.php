<<<<<<< HEAD
<?php
session_start();

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'auth';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

require_once 'controllers/' . ucfirst($controller) . 'Controller.php';

$controllerName = ucfirst($controller) . 'Controller';
$controllerInstance = new $controllerName();

$controllerInstance->$action();
?>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<<<<<<<< HEAD:views/login.php
    <h2>Iniciar Sesión</h2>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>
    <form action="index.php?controller=auth&action=login" method="POST">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
========
    <h1>Iniciar Sesión</h1>
    <form action="../controllers/indexController.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required><br><br>
>>>>>>>> d5ef40a24b888a1462b84494328694910beb779a:index.php
        <button type="submit">Iniciar Sesión</button>
    </form>
    <?php
        if(isset($error)) {
            echo "<p>$error</p>";
        }
    ?>
</body>
</html>
>>>>>>> d5ef40a24b888a1462b84494328694910beb779a
