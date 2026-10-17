<?php
require_once __DIR__ . '/../models/User.php';
class AuthController {
    private $db;
    public function __construct($pdo){ $this->db = $pdo; }
    public function loginForm(){
        require __DIR__ . '/../../views/pages/auth/login.php';
    }
    public function login(){
        $userModel = new User($this->db);
        $user = $userModel->findByUsername($_POST['username']);
        if ($user && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['user'] = $user;
            header('Location: /products');
            exit;
        } else {
            $_SESSION['error'] = 'Username / Password salah!';
            header('Location: /login');
            exit;
        }
    }
    public function logout(){
        session_destroy();
        header('Location: /login');
        exit;
    }
}