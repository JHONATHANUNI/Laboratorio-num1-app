<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Tienda Deportiva - Página de Inicio</title>
    <link rel="stylesheet" href="public/css/Stylehome.css">
</head>

<body>
    <header class="header">
        <h1>Tienda Deportiva</h1>
    </header>
    <div class="container">
        <div class="jumbotron">
            <img src="public/css/logoo.jpg" alt="Logo" class="logo">
            <h1>Bienvenido a nuestra tienda deportiva</h1>
            <p>Encuentra todo lo que necesitas para tu entrenamiento y vida activa.</p>
            <div class="nav">
                <a href="index.php?controller=invoice&action=index">Listado de Facturas</a>
                <a href="index.php?controller=client&action=index">Clientes</a> 
                <a href="index.php?controller=product&action=index">Productos</a>
                <a href="index.php?controller=invoice&action=create">Crear Factura</a>
            </div>
            <a href="index.php?controller=auth&action=logout" class="logout-btn">Cerrar Sesión</a>
        </div>
    </div>
    <footer class="footer">
        <p>&copy; 2024 Tienda Deportiva. Todos los derechos reservados.</p>
        <p>Contáctanos: info@tiendadeportiva.com</p>
    </footer>
</body>

</html>