<!DOCTYPE html>
<html>
<head>
    <title>Factura #<?php echo $invoiceData['referencia']; ?></title>
</head>
<body>
    <p>Referencia: <?php echo $invoiceData['referencia']; ?></p>
    <p>Fecha: <?php echo $invoiceData['fecha']; ?></p>
    <p>Cliente: <?php echo $invoiceData['idCliente']; ?></p>
    <p>Estado: <?php echo $invoiceData['estado']; ?></p>
    <p>Descuento: <?php echo $invoiceData['descuento']; ?>%</p>

    <h2>Productos</h2>
    <table border="1">
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
        </tr>
        <?php foreach($items as $item): ?>
            <tr>
                <td><?php echo $item['product_name']; ?></td>
                <td><?php echo $item['cantidad']; ?></td>
                <td><?php echo $item['precioUnitario']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php?controller=invoice&action=index">Volver al listado</a>
</body>
</html>
