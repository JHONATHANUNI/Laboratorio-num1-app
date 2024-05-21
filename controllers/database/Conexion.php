<?php
class Conexion
{
    public static function conectar()
    {
        $db_host = 'localhost';
        $db_nombre = 'facturacion_tienda_db';
        $db_usuario = 'root';
        $db_contra = '';

        try {
            $conexion = new PDO("mysql:host=$db_host;dbname=$db_nombre", $db_usuario, $db_contra);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
?>

