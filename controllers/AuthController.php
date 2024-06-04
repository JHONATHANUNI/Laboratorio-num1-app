<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new User();
            $user = $userModel->login($username, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: index.php?controller=home&action=index'); // Redirigir a la página de inicio
                exit();
            } else {
                $error = 'Usuario o contraseña incorrectos';
                require 'views/login.php';
                exit();
            }
        } else {
            require 'views/login.php';
            exit();
        }
    }

    public function logout() {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: index.php?controller=auth&action=login');
        exit();
    }
}
?>


