<?php
require_once __DIR__ . '/../models/User.php';

class AuthController
{

    // Método para manejar el inicio de sesión
    public function login()
    {
        // Verifica si la solicitud es POST (envío del formulario)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtiene el nombre de usuario y la contraseña enviados desde el formulario
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // Crea una instancia del modelo User para verificar las credenciales
            $userModel = new User();
            $user = $userModel->login($username, $password);

            // Si las credenciales son correctas, guarda la información del usuario en la sesión y redirige al dashboard
            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: index.php?controller=invoice&action=index'); // Redirige a la lista de facturas
                exit; // Detiene la ejecución adicional
            } else {
                // Si las credenciales son incorrectas, muestra un mensaje de error en la vista de inicio de sesión
                $error = 'Usuario o contraseña incorrectos';
                require 'views/login.php';
                exit; // Detiene la ejecución adicional
            }
        } else {
            // Si la solicitud no es POST, simplemente muestra la vista de inicio de sesión
            require 'views/login.php';
            exit; // Detiene la ejecución adicional
        }
    }

    // Método para manejar el cierre de sesión
    public function logout()
    {
        // Elimina la información del usuario de la sesión
        unset($_SESSION['user']);
        // Destruye la sesión
        session_destroy();
        // Redirige a la página de inicio de sesión
        header('Location: index.php?controller=auth&action=login');
        exit; // Detiene la ejecución adicional
    }
    
}
