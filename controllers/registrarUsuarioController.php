<?php
include_once 'database/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    // Verificar si el usuario ya existe
    $sql = "SELECT id FROM usuarios WHERE usuario = :usuario";
    $stmt = Conexion::conectar()->prepare($sql);
    $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $error = "El usuario ya existe";
    } else {
        // Insertar el nuevo usuario en la base de datos
        $sql = "INSERT INTO usuarios (usuario, pwd) VALUES (:usuario, :pwd)";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);
        $stmt->bindParam(":pwd", $hashed_password, PDO::PARAM_STR);
        if ($stmt->execute()) {
            header("location: ../index.php");
            exit();
        } else {
            $error = "Algo salió mal. Por favor, inténtalo de nuevo.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <h1>Registro</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required><br><br>
        <button type="submit">Registrarse</button>
        <?php if(isset($error)) { echo "<p>$error</p>"; } ?>
    </form>
</body>
</html>
