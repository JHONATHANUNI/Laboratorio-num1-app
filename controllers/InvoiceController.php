<?php
require_once __DIR__ . '/../models/Invoice.php';
require_once __DIR__ . '/../models/Client.php';
require_once __DIR__ . '/../models/InvoiceItem.php';
require_once __DIR__ . '/../models/Product.php';

class InvoiceController
{
    // Función para mostrar todas las facturas previamente generadas
    public function index()
    {
        $invoiceModel = new Invoice();
        $invoices = $invoiceModel->getAllInvoices();
        require __DIR__ . '/../views/invoice_list.php';
    }

    // Función para mostrar el formulario de creación de factura
    public function create()
    {
        $productModel = new Product();
        $products = $productModel->getAll();
        require __DIR__ . '/../views/invoice_form.php';
    }

    // Función para crear una nueva factura
    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recolectar datos del formulario del cliente
            $clientData = [
                'nombreCompleto' => $_POST['nombreCompleto'] ?? '',
                'tipoDocumento' => $_POST['tipoDocumento'] ?? '',
                'numeroDocumento' => $_POST['numeroDocumento'] ?? '',
                'email' => $_POST['email'] ?? '',
                'telefono' => $_POST['telefono'] ?? ''
            ];

            // Crear cliente
            $client = new Client();
            $clientId = $client->createClient($clientData);

            // Generar referencia única
            $reference = uniqid();

            // Calcular total y descuento
            $productModel = new Product();
            $total = 0;
            foreach ($_POST['productos'] as $productId) {
                $product = $productModel->getById($productId);
                $total += $product['precio'] ?? 0;
            }
            $descuento = ($total > 200000) ? 10 : (($total > 100000) ? 5 : 0);

            // Determinar el estado de la factura
            $estado = 'Pagada';
            // Aquí podrías agregar lógica adicional para determinar el estado de la factura

            // Crear datos de la factura
            $invoiceData = [
                'referencia' => $reference,
                'fecha' => date('Y-m-d H:i:s'),
                'idCliente' => $clientId,
                'estado' => $estado,
                'descuento' => $descuento
            ];

            // Crear factura en la base de datos
            $invoice = new Invoice();
            $invoiceId = $invoice->createInvoice($invoiceData);

            // Crear detalles de la factura (ítems)
            $invoiceItem = new InvoiceItem();
            foreach ($_POST['productos'] as $productId) {
                $product = $productModel->getById($productId);
                $itemData = [
                    'referenciaFactura' => $reference,
                    'idArticulo' => $productId,
                    'cantidad' => 1,
                    'precioUnitario' => $product['precio'] ?? 0,
                    'precio' => $product['precio'] ?? 0
                ];
                $invoiceItem->createInvoiceItem($itemData);
            }

            // Redirigir a la página de detalles de la factura
            header('Location: index.php?controller=invoice&action=show&reference=' . $reference);
            exit;
        } else {
            // Manejar el caso en el que no se reciben datos POST
        }
    }


    // Función para marcar una factura como 'Error', 'Cambio' o 'Devolucion'
    public function updateState() {
        if (isset($_GET['reference']) && isset($_GET['state'])) {
            $reference = $_GET['reference'];
            $state = $_GET['state'];
    
            $validStates = ['Error', 'Cambio', 'Devolucion'];
    
            if (in_array($state, $validStates)) {
                $invoiceModel = new Invoice();
                $currentInvoice = $invoiceModel->findInvoiceByReference($reference);
    
                if ($currentInvoice && isset($currentInvoice['estado']) && $currentInvoice['estado'] === 'Pagada') {
                    $result = $invoiceModel->updateInvoiceState($reference, $state);
    
                    if ($result) {
                        header("Location: index.php?controller=invoice&action=index");
                        exit;
                    } else {
                        echo "Error al actualizar el estado de la factura.";
                    }
                } else {
                    echo "Solo se pueden cambiar el estado de las facturas 'Pagada'.";
                }
            } else {
                echo "Estado no válido.";
            }
        } else {
            echo "Parámetros incompletos.";
        }
    }
    

    // Función para mostrar los detalles de una factura
    public function show() {
        if (isset($_GET['reference'])) {
            $reference = $_GET['reference'];
            $invoiceModel = new Invoice();
            $invoiceData = $invoiceModel->findInvoiceByReference($reference);
    
            if ($invoiceData) {
                $clientModel = new Client();
                $clientData = $clientModel->getClientById($invoiceData['idCliente']);
                $invoiceItemModel = new InvoiceItem();
                // Obtener los elementos de la factura por referencia
                $items = $invoiceItemModel->findInvoiceItemsByReference($reference);
    
                // Mostrar la vista con los datos recuperados
                require __DIR__ . '/../views/invoice_view.php';
                exit;
            } else {
                echo "La factura con la referencia $reference no fue encontrada.";
                exit;
            }
        } else {
            echo "No se proporcionó una referencia de factura.";
            exit;
        }
    }
    
}
