<?php

require_once("Conexion.php");

class Cliente
{
    private $db;
    private $nombre;
    private $tipo_documento;
    private $numero_documento;
    private $email;
    private $telefono;

    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setTipoDocumento($tipo_documento)
    {
        $this->tipo_documento = $tipo_documento;
    }

    public function setNumeroDocumento($numero_documento)
    {
        $this->numero_documento = $numero_documento;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
}
?>
