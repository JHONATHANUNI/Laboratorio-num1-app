<!DOCTYPE html>
<html>
<head>
    <title>Listado de Facturas</title>
</head>
<body>
    <h1>Listado de Facturas</h1>
    <table border="1">
        <tr>
            <th>Referencia</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Estado</th>
            <th>Descuento</th>
        </tr>
        <?php foreach($invoices as $invoice): ?>
            <tr>
                <td><?php echo $invoice['referencia']; ?></td>
                <td><?php echo $invoice['fecha']; ?></td>
                <td><?php echo $invoice['idCliente']; ?></td>
                <td><?php echo $invoice['estado']; ?></td>
                <td><?php echo $invoice['descuento']; ?>%</td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php?controller=invoice&action=create">Crear Factura</a>
</body>
</html>
