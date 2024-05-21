<?php
require_once __DIR__ . '/../models/Invoice.php';
require_once __DIR__ . '/../models/Client.php';
require_once __DIR__ . '/../models/InvoiceItem.php';
require_once __DIR__ . '/../models/Product.php';

class InvoiceController {
    public function index() {
        $invoice = new Invoice();
        $invoices = $invoice->getAllInvoices();
        require __DIR__ . '/../views/invoice_list.php';
    }

    public function create() {
        $productModel = new Product();
        $products = $productModel->getAll();
        require __DIR__ . '/../views/invoice_form.php';
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $clientData = [
                'nombreCompleto' => $_POST['nombreCompleto'],
                'tipoDocumento' => $_POST['tipoDocumento'],
                'numeroDocumento' => $_POST['numeroDocumento'],
                'email' => $_POST['email'],
                'telefono' => $_POST['telefono']
            ];

            $client = new Client();
            $clientId = $client->findOrCreateClient($clientData);

            $reference = uniqid();

            $productModel = new Product();
            $total = 0;
            foreach ($_POST['productos'] as $productId) {
                $product = $productModel->getById($productId);
                $total += $product['precio'];
            }
            $descuento = ($total > 200000) ? 10 : (($total > 100000) ? 5 : 0);

            $invoiceData = [
                'referencia' => $reference,
                'fecha' => date('Y-m-d H:i:s'),
                'idCliente' => $clientId,
                'estado' => 'Pagada',
                'descuento' => $descuento
            ];
            $invoice = new Invoice();
            $invoiceId = $invoice->createInvoice($invoiceData);

            $invoiceItem = new InvoiceItem();
            foreach ($_POST['productos'] as $productId) {
                $product = $productModel->getById($productId);
                $itemData = [
                    'referenciaFactura' => $reference,
                    'idArticulo' => $productId,
                    'cantidad' => 1,
                    'precioUnitario' => $product['precio'],
                    'precio' => $product['precio']
                ];
                $invoiceItem->createInvoiceItem($itemData);
            }

            header('Location: index.php?controller=invoice&action=show&reference=' . $reference);
        } else {
            // Manejar el caso en el que no se reciben datos POST
        }
    }

    public function show() {
        $invoice = new Invoice();
        $invoiceItem = new InvoiceItem();

        if (isset($_GET['reference'])) {
            $reference = $_GET['reference'];
            $invoiceData = $invoice->findInvoiceByReference($reference);
            if ($invoiceData) {
                $items = $invoiceItem->findInvoiceItemsByReference($reference);
                require __DIR__ . '/../views/invoice_view.php';
            } else {
                echo "La factura con la referencia $reference no fue encontrada.";
            }
        } else {
            echo "No se proporcionó una referencia de factura.";
        }
    }
}
?>