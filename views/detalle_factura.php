<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Factura</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Detalle de Factura</h1>
    <h2>Número de Referencia: <?php echo $detalle['numero_referencia']; ?></h2>
    <p>Fecha de Compra: <?php echo $detalle['fecha_compra']; ?></p>
    <p>Estado: <?php echo $detalle['estado']; ?></p>
    <p>Nombre del Cliente: <?php echo $detalle['nombre_cliente']; ?></p>
    <p>Tipo de Documento: <?php echo $detalle['tipo_documento']; ?></p>
    <p>Número de Documento: <?php echo $detalle['numero_documento']; ?></p>
    <p>Teléfono: <?php echo $detalle['telefono']; ?></p>
    <p>Email: <?php echo $detalle['email']; ?></p>
    <p>Descuento: <?php echo $detalle['descuento']; ?>%</p>
    <p>Total a Pagar: $<?php echo number_format($detalle['total'], 2); ?></p>
    <h3>Productos:</h3>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Valor Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalle['productos'] as $producto): ?>
                <tr>
                    <td><?php echo $producto['nombre']; ?></td>
                    <td><?php echo $producto['cantidad']; ?></td>
                    <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                    <td>$<?php echo number_format($producto['valor_total'], 2); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="consultar_facturas.php">Volver</a>
    <a href="cerrar_sesion.php">Cerrar Sesión</a>
</body>
</html>
