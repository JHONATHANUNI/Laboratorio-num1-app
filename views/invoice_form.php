<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Factura</title>
    <link rel="stylesheet" type="text/css" href="public/css/form.css">
</head>

<body>
    <header>
        <h1>Crear Factura</h1>
    </header>
    <main>
        <form action="index.php?controller=invoice&action=store" method="post">
            <section class="customer-info">
                <h2>Información del Cliente</h2>
                <div class="form-group">
                    <label for="nombreCompleto">Nombre Completo:</label>
                    <input type="text" id="nombreCompleto" name="nombreCompleto" required>
                </div>
                <div class="form-group">
                    <label for="tipoDocumento">Tipo de Documento:</label>
                    <select id="tipoDocumento" name="tipoDocumento">
                        <option value="CC">Cédula de Ciudadanía</option>
                        <option value="CE">Cédula de Extranjería</option>
                        <option value="NIT">NIT</option>
                        <option value="TI">Tarjeta de Identidad</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="numeroDocumento">Número de Documento:</label>
                    <input type="text" id="numeroDocumento" name="numeroDocumento" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" required>
                </div>
            </section>
            <section class="products">
                <h2>Productos</h2>
                <?php foreach ($products as $product) : ?>
                    <div class="product-item">
                        <input type="checkbox" name="productos[]" value="<?php echo $product['id']; ?>">
                        <label><?php echo $product['nombre']; ?></label>
                        <input type="number" name="cantidades[]" value="1" min="1" max="10">
                        <span class="price"><?php echo $product['precio']; ?></span>
                    </div>
                <?php endforeach; ?>
                <p>Total a pagar: <span id="total">$0</span></p>
            </section>
            <div class="button-group">
                <button type="submit">Crear Factura</button>
                <a href="index.php?controller=user&action=logout">Cerrar Sesión</a>
            </div>
        </form>
    </main>
    <script src="public/js/scriptsform.js"></script>
</body>

</html>