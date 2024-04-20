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
    <?php
        session_start();
        if(!isset($_SESSION['usuario'])) {
            header('Location: login.php');
            exit();
        }
        require_once 'app/controllers/ConexionDBController.php';
        require_once 'app/models/Contacto.php';

        $contacto = new Contacto();
        $facturas = $contacto->consultarFacturas();

        if ($facturas) {
            echo "<table>";
            echo "<tr><th>Referencia</th><th>Fecha</th><th>Estado</th><th>Nombre</th><th>Documento</th><th>Teléfono</th><th>Email</th><th>Total</th></tr>";
            foreach ($facturas as $factura) {
                echo "<tr>";
                echo "<td>" . $factura['referencia'] . "</td>";
                echo "<td>" . $factura['fecha'] . "</td>";
                echo "<td>" . $factura['estado'] . "</td>";
                echo "<td>" . $factura['nombre'] . "</td>";
                echo "<td>" . $factura['numero_documento'] . "</td>";
                echo "<td>" . $factura['telefono'] . "</td>";
                echo "<td>" . $factura['email'] . "</td>";
                echo "<td>" . $factura['total'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No hay facturas registradas.</p>";
        }
    ?>
    <br>
    <a href="index.php">Volver</a>
</body>
</html>
