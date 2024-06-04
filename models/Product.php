<?php
require_once __DIR__ . '/../config/Database.php';

class Product {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM articulos";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductById($productId) {
        $sql = "SELECT * FROM articulos WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Agrega otros métodos según sea necesario, como createProduct(), updateProduct(), deleteProduct(), etc.
}
?>
