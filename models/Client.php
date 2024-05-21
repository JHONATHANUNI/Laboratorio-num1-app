
<?php
require_once __DIR__ . '/../config/Database.php';

class Client {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function findClientByDocument($tipoDocumento, $numeroDocumento) {
        $sql = "SELECT * FROM clientes WHERE tipoDocumento = ? AND numeroDocumento = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $tipoDocumento, $numeroDocumento);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function createClient($data) {
        $sql = "INSERT INTO clientes (nombreCompleto, tipoDocumento, numeroDocumento, email, telefono) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssss", $data['nombreCompleto'], $data['tipoDocumento'], $data['numeroDocumento'], $data['email'], $data['telefono']);
        $stmt->execute();
        return $this->db->insert_id;
    }

    public function findOrCreateClient($clientData) {
        $existingClient = $this->findClientByDocument($clientData['tipoDocumento'], $clientData['numeroDocumento']);
        if ($existingClient) {
            return $existingClient['id'];
        } else {
            return $this->createClient($clientData);
        }
    }
}
?>