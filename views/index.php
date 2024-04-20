<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de artículos deportivos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Tienda de artículos deportivos</h1>
    <?php
        session_start();
        if(!isset($_SESSION['usuario'])) {
            header('Location: login.php');
            exit();
        }
    ?>
    <p>Bienvenido, <?php echo $_SESSION['usuario']; ?> | <a href="logout.php">Cerrar sesión</a></p>
    <h2>Generar Factura</h2>
    <form action="generar_factura.php" method="post">
        <label for="nombre">Nombre Completo:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        <label for="tipo_documento">Tipo de Documento:</label>
        <select id="tipo_documento" name="tipo_documento">
            <option value="CC">Cédula de Ciudadanía</option>
            <option value="CE">Cédula de Extranjería</option>
            <option value="NIT">NIT</option>
            <option value="TI">Tarjeta de Identidad</option>
            <option value="Otro">Otro</option>
        </select><br><br>
        <label for="numero_documento">Número de Documento:</label>
        <input type="text" id="numero_documento" name="numero_documento" required><br><br>
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="producto">Producto:</label>
        <select id="producto" name="producto" required>
            <?php
                require_once 'app/models/Contacto.php';
                $contacto = new Contacto();
                $productos = $contacto->listarProductos();
                foreach ($productos as $producto) {
                    echo "<option value='" . $producto['aid'] . "'>" . $producto['nombre'] . "</option>";
                }
            ?>
        </select><br><br>
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" min="1" required><br><br>
        <button type="submit">Generar Factura</button>
    </form>
    <br>
    <a href="consultar_facturas.php">Consultar Facturas</a>
</body>
</html>
