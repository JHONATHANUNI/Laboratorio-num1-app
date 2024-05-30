<?php
require_once __DIR__ . '/../config/Database.php';

class Invoice {
    
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function createInvoice($data) {
        $sql = "INSERT INTO facturas (referencia, fecha, idCliente, estado, descuento) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssiss", $data['referencia'], $data['fecha'], $data['idCliente'], $data['estado'], $data['descuento']);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function findInvoiceByReference($reference) {
        $sql = "SELECT * FROM facturas WHERE referencia = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $reference);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getAllInvoices() {
        $sql = "SELECT * FROM facturas";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Acciones para actualizar el estado de la factura y buscar elementos por referencia

    public function updateInvoiceState($reference, $state) {
        $sql = "UPDATE facturas SET estado = ? WHERE referencia = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $state, $reference);
        return $stmt->execute();
    }

    public function findInvoiceItemsByReference($reference) {
        $sql = "SELECT * FROM factura_items WHERE referenciaFactura = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $reference);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>

