<?php

require_once("Conexion.php");

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    public function iniciarSesion($usuario, $contraseña)
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
        $stmt->bindParam(":usuario", $usuario);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            if (password_verify($contraseña, $resultado['pwd'])) {
                return true;
            }
        }
        return false;
    }
}
?>

