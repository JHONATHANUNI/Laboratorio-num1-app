<?php
require_once __DIR__ . '/../config/Database.php';

class Client {
    private $db;

    public function __construct() {
        // Verificar la conexión a la base de datos
        $this->db = Database::connect();
    }
    
    public function getAllClients() {
        // Query para seleccionar todos los clientes
        $sql = "SELECT * FROM clientes";
        $result = $this->db->query($sql);
    
        // Verificar si se obtuvieron resultados
        if ($result->num_rows > 0) {
            // Convertir los resultados en un array asociativo
            $clients = array();
            while ($row = $result->fetch_assoc()) {
                $clients[] = $row;
            }
            return $clients;
        } else {
            // Si no se encontraron clientes, retornar un array vacío
            return array();
        }
    }
    

    public function findClientByDocument($tipoDocumento, $numeroDocumento) {
        $sql = "SELECT * FROM clientes WHERE tipoDocumento = ? AND numeroDocumento = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $tipoDocumento, $numeroDocumento);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function createClient($data) {
        // Insertar un nuevo cliente en la base de datos
        $sql = "INSERT INTO clientes (nombreCompleto, tipoDocumento, numeroDocumento, email, telefono) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssss", $data['nombreCompleto'], $data['tipoDocumento'], $data['numeroDocumento'], $data['email'], $data['telefono']);
        $stmt->execute();
        return $this->db->insert_id;
    }

    public function getClientById($clientId) {
        // Obtener un cliente por su ID
        $sql = "SELECT * FROM clientes WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $clientId);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateClient($clientId, $data) {
        // Actualizar los datos de un cliente
        $sql = "UPDATE clientes SET nombreCompleto = ?, tipoDocumento = ?, numeroDocumento = ?, email = ?, telefono = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssssi", $data['nombreCompleto'], $data['tipoDocumento'], $data['numeroDocumento'], $data['email'], $data['telefono'], $clientId);
        $stmt->execute();
    }

    public function deleteClient($clientId) {
        // Eliminar un cliente por su ID
        $sql = "DELETE FROM clientes WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $clientId);
        $stmt->execute();
    }

    public function searchClients($searchTerm) {
        // Buscar clientes por un término de búsqueda
        $sql = "SELECT * FROM clientes WHERE nombreCompleto LIKE ?";
        $stmt = $this->db->prepare($sql);
        $searchTerm = "%" . $searchTerm . "%";
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    public function findOrCreateClient($clientData) {
        // Buscar si ya existe un cliente con el mismo número de documento
        $existingClient = $this->getClientByDocumentNumber($clientData['numeroDocumento']);
    
        if ($existingClient) {
            // Si el cliente ya existe, devolver su ID
            return $existingClient['id'];
        } else {
            // Si el cliente no existe, crear uno nuevo
            $clientId = $this->createClient($clientData);
            return $clientId;
        }
    }
    public function getClientByDocumentNumber($documentNumber) {
        $sql = "SELECT * FROM clientes WHERE numeroDocumento = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $documentNumber);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
    
}
?>
