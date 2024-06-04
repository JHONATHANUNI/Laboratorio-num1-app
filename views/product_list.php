<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="public/css/product.css">
</head>

<body>
    <div class="header">
        <img src="public/css/logoo.jpg" alt="Logo" class="logo">
        <h1>Lista de Productos</h1>
    </div>
    <div class="container">
        <table>
            <tr>
                <th>ID del Producto</th>
                <th>Nombre del Producto</th>
                <th>Precio</th>
            </tr>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['nombre']; ?></td>
                    <td>$<?php echo number_format($product['precio'], 2); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="index.php?controller=auth&action=logout" class="logout-btn">Cerrar Sesión</a>
        <a href="index.php" class="back-btn">Volver a Inicio</a>
    </div>
</body>

</html>