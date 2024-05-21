<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $userModel = new User();
            $user = $userModel->login($username, $password);
            
            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: index.php?controller=invoice&action=index');
            } else {
                $error = 'Usuario o contraseña incorrectos';
                require 'views/login.php';
            }
        } else {
            require 'views/login.php';
        }
    }

    public function logout() {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: index.php?controller=auth&action=login');
    }
}
?>
