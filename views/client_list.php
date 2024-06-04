<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="public/css/client.css">
</head>
<body>
    <div class="header">
        <img src="public/css/logoo.jpg" alt="Logo" class="logo">
        <h1>Lista de Clientes</h1>
    </div>
    <div class="container">
        <table>
            <tr>
                <th>Nombre Completo</th>
                <th>Tipo de Documento</th>
                <th>Número de Documento</th>
                <th>Email</th>
                <th>Teléfono</th>
            </tr>
            <?php foreach ($clients as $client) : ?>
                <tr>
                    <td><?php echo $client['nombreCompleto']; ?></td>
                    <td><?php echo $client['tipoDocumento']; ?></td>
                    <td><?php echo $client['numeroDocumento']; ?></td>
                    <td><?php echo $client['email']; ?></td>
                    <td><?php echo $client['telefono']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="index.php?controller=auth&action=logout" class="logout-btn">Cerrar Sesión</a>
        <a href="index.php" class="back-btn">Volver a Inicio</a>
    </div>
</body>
</html>

