<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Facturas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Consultar Facturas</h1>
    <table>
        <thead>
            <tr>
                <th>Número de Referencia</th>
                <th>Fecha de Compra</th>
                <th>Estado</th>
                <th>Detalle</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($facturas as $factura): ?>
                <tr>
                    <td><?php echo $factura['refencia']; ?></td>
                    <td><?php echo $factura['fecha']; ?></td>
                    <td><?php echo $factura['estado']; ?></td>
                    <td><a href="detalleFacturaController.php?refencia=<?php echo $factura['refencia']; ?>">Ver Detalle</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="cerrar_sesion.php">Cerrar Sesión</a>
</body>
</html>
