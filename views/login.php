<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="public/css/login.css">
</head>
<body class="login-body">
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <?php if (isset($error)): ?>
            <p class="error-message"><?= $error ?></p>
        <?php endif; ?>
        <form action="index.php?controller=auth&action=login" method="POST" class="login-form">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-button">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>

