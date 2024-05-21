<?php

require_once("Conexion.php");

class Producto
{
    private $db;

    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    public function listarProductos()
    {
        $stmt = $this->db->query("SELECT * FROM articulos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
