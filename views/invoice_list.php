<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Facturas</title>
    <link rel="stylesheet" type="text/css" href="public/css/list.css">
</head>
<body>
    <div class="container">
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
                            <a href="index.php?controller=invoice&action=show&reference=<?php echo $invoice['referencia']; ?>" class="btn">Ver</a>
                            <a href="index.php?controller=invoice&action=updateState&reference=<?php echo $invoice['referencia']; ?>&state=Error" class="btn create-btn">Marcar Error</a>
                            <a href="index.php?controller=invoice&action=updateState&reference=<?php echo $invoice['referencia']; ?>&state=Cambio" class="btn create-btn">Marcar Cambio</a>
                            <a href="index.php?controller=invoice&action=updateState&reference=<?php echo $invoice['referencia']; ?>&state=Devolucion" class="btn create-btn">Marcar Devolución</a>
                        <?php else : ?>
                            <span class="btn disabled-btn">No disponible</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="index.php?controller=invoice&action=create" class="btn create-btn">Crear Factura</a>
        <a href="index.php?controller=home&action=index" class="btn navigation-btn">Volver al Inicio</a>
    </div>
</body>
</html>
