<?php
require_once __DIR__ . '/../models/Client.php';

class ClientController {
    public function create() {
        // Verificar si se reciben datos POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener datos del formulario
            $clientData = [
                'nombreCompleto' => $_POST['nombreCompleto'],
                'tipoDocumento' => $_POST['tipoDocumento'],
                'numeroDocumento' => $_POST['numeroDocumento'],
                'email' => $_POST['email'],
                'telefono' => $_POST['telefono']
            ];

            // Crear una instancia del modelo de cliente
            $clientModel = new Client();

            // Llamar al método para crear un nuevo cliente
            $clientId = $clientModel->createClient($clientData);

            // Redirigir a la página de detalles del cliente recién creado
            header("Location: index.php?controller=client&action=show&id=$clientId");
            exit;
        } else {
            // Si no se reciben datos POST, mostrar el formulario para crear un cliente
            require __DIR__ . '/../views/client_create.php';
        }
    }

    public function show($clientId) {
        // Crear una instancia del modelo de cliente
        $clientModel = new Client();

        // Obtener información del cliente por su ID
        $client = $clientModel->getClientById($clientId);

        // Verificar si se encontró el cliente
        if ($client) {
            // Mostrar la vista de detalles del cliente
            require __DIR__ . '/../views/client_show.php';
        } else {
            // Si no se encuentra el cliente, mostrar un mensaje de error
            echo "Cliente no encontrado.";
        }
    }

    public function update($clientId) {
        // Verificar si se reciben datos POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener datos del formulario
            $clientData = [
                'nombreCompleto' => $_POST['nombreCompleto'],
                'tipoDocumento' => $_POST['tipoDocumento'],
                'numeroDocumento' => $_POST['numeroDocumento'],
                'email' => $_POST['email'],
                'telefono' => $_POST['telefono']
            ];

            // Crear una instancia del modelo de cliente
            $clientModel = new Client();

            // Llamar al método para actualizar el cliente
            $clientModel->updateClient($clientId, $clientData);

            // Redirigir a la página de detalles del cliente actualizado
            header("Location: index.php?controller=client&action=show&id=$clientId");
            exit;
        } else {
            // Si no se reciben datos POST, obtener y mostrar el formulario para actualizar el cliente
            $clientModel = new Client();
            $client = $clientModel->getClientById($clientId);
            require __DIR__ . '/../views/client_update.php';
        }
    }

    public function delete($clientId) {
        // Crear una instancia del modelo de cliente
        $clientModel = new Client();

        // Llamar al método para eliminar el cliente
        $clientModel->deleteClient($clientId);

        // Redirigir a la página de listado de clientes
        header("Location: index.php?controller=client&action=index");
        exit;
    }

    public function search() {
        // Verificar si se reciben datos POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener el término de búsqueda
            $searchTerm = $_POST['search'];

            // Crear una instancia del modelo de cliente
            $clientModel = new Client();

            // Llamar al método para buscar clientes por el término especificado
            $clients = $clientModel->searchClients($searchTerm);

            // Mostrar la vista de resultados de búsqueda
            require __DIR__ . '/../views/client_search.php';
        } else {
            // Si no se reciben datos POST, mostrar el formulario de búsqueda
            require __DIR__ . '/../views/client_search_form.php';
        }
    }
}
?>
