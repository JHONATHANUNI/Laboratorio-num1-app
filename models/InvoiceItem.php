<?php
require_once __DIR__ . '/../config/Database.php';

class InvoiceItem {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function createInvoiceItem($data) {
        $sql = "INSERT INTO detalleFacturas (referenciaFactura, idArticulo, cantidad, precioUnitario) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("siid", $data['referenciaFactura'], $data['idArticulo'], $data['cantidad'], $data['precioUnitario']);
        $stmt->execute();
    }
    

    public function findInvoiceItemsByReference($reference) {
        $sql = "SELECT df.*, a.nombre as product_name FROM detalleFacturas df INNER JOIN articulos a ON df.idArticulo = a.id WHERE df.referenciaFactura = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $reference);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // --------------------------------------------------------
    // Acciones lista factura 
    public function findInvoiceItemsByReferences($reference) {
        // Aquí asumimos que tienes una base de datos o algún mecanismo de almacenamiento
        // Debes reemplazar esta lógica con la que se adapte a tu sistema de almacenamiento
        $query = "SELECT * FROM invoice_items WHERE referenciaFactura = :reference";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':reference', $reference);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>