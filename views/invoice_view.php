<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura #<?php echo $invoiceData['referencia']; ?></title>
    <link rel="stylesheet" type="text/css" href="public/css/view.css">
</head>

<body>
    <div class="container">
        <h1>Factura #<?php echo $invoiceData['referencia']; ?></h1>
        <div class="invoice-details">
            <p><strong>Referencia:</strong> <?php echo $invoiceData['referencia']; ?></p>
            <p><strong>Fecha:</strong> <?php echo $invoiceData['fecha']; ?></p>
            <p><strong>Estado:</strong> <?php echo $invoiceData['estado']; ?></p>
            <!-- Mostrar información del cliente -->
            <div class="client-details">
                <h2>Información del Cliente</h2>
                <p><strong>Nombre:</strong> <?php echo $clientData['nombreCompleto'] ?? ''; ?></p>
                <p><strong>Tipo Documento:</strong> <?php echo $clientData['tipoDocumento'] ?? ''; ?></p>
                <p><strong>Número Documento:</strong> <?php echo $clientData['numeroDocumento'] ?? ''; ?></p>
                <p><strong>Teléfono:</strong> <?php echo $clientData['telefono'] ?? ''; ?></p>
                <p><strong>Email:</strong> <?php echo $clientData['email'] ?? ''; ?></p>
            </div>
            <p><strong>Descuento:</strong> <?php echo $invoiceData['descuento']; ?>%</p>
        </div>

        <h2>Productos</h2>
        <table class="invoice-items">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Valor Total</th>
                </tr>
            </thead>
            <!-- Mostrar los detalles de los elementos de la factura -->
            <tbody>
                <?php foreach ($items as $item) : ?>
                    <tr>
                        <td><?php echo $item['product_name']; ?></td>
                        <td><?php echo $item['cantidad']; ?></td>
                        <td><?php echo $item['precioUnitario']; ?></td>
                        <td><?php echo $item['precioUnitario'] * $item['cantidad']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
        <div class="invoice-total">
            <!-- Aquí puedes mostrar el total y el total a pagar -->
        </div>
        <a href="index.php?controller=invoice&action=index" class="btn">Volver al listado</a>
    </div>
</body>

</html>