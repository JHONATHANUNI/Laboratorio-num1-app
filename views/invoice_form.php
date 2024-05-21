<!DOCTYPE html>
<html>
<head>
    <title>Crear Factura</title>
</head>
<body>
    <h1>Crear Factura</h1>
    <form action="index.php?controller=invoice&action=store" method="post">
        <h2>Cliente</h2>
        <label>Nombre Completo:</label>
        <input type="text" name="nombreCompleto" required><br>
        <label>Tipo de Documento:</label>
        <select name="tipoDocumento">
            <option value="CC">Cédula de Ciudadanía</option>
            <option value="CE">Cédula de Extranjería</option>
            <option value="NIT">NIT</option>
            <option value="TI">Tarjeta de Identidad</option>
            <option value="Otro">Otro</option>
        </select><br>
        <label>Número de Documento:</label>
        <input type="text" name="numeroDocumento" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Teléfono:</label>
        <input type="text" name="telefono" required><br>
        
        <h2>Productos</h2>
        <?php foreach($products as $product): ?>
            <input type="checkbox" name="productos[]" value="<?php echo $product['id']; ?>"> <?php echo $product['nombre']; ?><br>
        <?php endforeach; ?>
        <button type="submit">Crear Factura</button>
    </form>
</body>
</html>
