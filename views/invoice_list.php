<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Facturas</title>
    <link rel="stylesheet" type="text/css" href="public/css/list.css">
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
            <th>Acciones</th>
        </tr>
        <?php foreach ($invoices as $invoice) : ?>
            <tr>
                <td><?php echo $invoice['referencia']; ?></td>
                <td><?php echo $invoice['fecha']; ?></td>
                <td><?php echo $invoice['idCliente']; ?></td>
                <td><?php echo $invoice['estado']; ?></td>
                <td><?php echo $invoice['descuento']; ?>%</td>
                <td class="invoice-actions">
                    <?php if ($invoice['estado'] === 'Pagada') : ?>
                        <a href="index.php?controller=invoice&action=show&reference=<?php echo $invoice['referencia']; ?>">Ver</a>
                        <a href="index.php?controller=invoice&action=updateState&reference=<?php echo $invoice['referencia']; ?>&state=Error">Marcar Error</a>
                        <a href="index.php?controller=invoice&action=updateState&reference=<?php echo $invoice['referencia']; ?>&state=Cambio">Marcar Cambio</a>
                        <a href="index.php?controller=invoice&action=updateState&reference=<?php echo $invoice['referencia']; ?>&state=Devolucion">Marcar Devolución</a>
                    <?php else : ?>
                        <span>No disponible</span>
                    <?php endif; ?>
                </td>

                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php?controller=invoice&action=create" class="create-invoice-btn">Crear Factura</a>

</body>

</html>