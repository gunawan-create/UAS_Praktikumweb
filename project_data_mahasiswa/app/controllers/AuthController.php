<?php
require_once 'app/models/User.php';

class AuthController {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = (new User())->login($_POST['username'], $_POST['password']);
            if ($user) {
                $_SESSION['user'] = $user;
                header("Location: index.php?url=admin/dashboard");
                exit;
            }
            $_SESSION['error'] = "Login gagal";
            header("Location: index.php?url=login");
            exit;
        }
        require 'app/views/auth/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            (new User())->register($_POST['username'], $_POST['password']);
            header("Location: index.php?url=login");
            exit;
        }
        require 'app/views/auth/register.php';
    }

    public function forgotPassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            (new User())->resetPassword($_POST['username'], $_POST['password']);
            header("Location: index.php?url=login");
            exit;
        }
        require 'app/views/auth/forgot_password.php';
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?url=login");
        exit;
    }
}
