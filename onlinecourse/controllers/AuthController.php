<?php
session_start();

class AuthController {

    public function loginPage() {
        include "./views/auth/login.php";
    }
    public function login() {
        require "./config/Database.php";
        require "./models/User.php";

        $database = new Database();
        $db = $database->connect();
        $userModel = new User($db);

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userModel->findByEmail($email);
    //Kiểm tra có email không
        if (!$user) {
            $_SESSION['error'] = "Email không tồn tại!";
            header("Location: index.php?controller=auth&action=loginPage");
            exit;
        }
    // Kiểm tra mật khẩu
        if ($password != $user['password']) {
            $_SESSION['error'] = "Sai mật khẩu!";
            header("Location: index.php?controller=auth&action=loginPage");
            exit;
        }
    // Lưu session đăng nhập
        $_SESSION['user'] = [
             "id" => $user['id'],
             "name" => $user['fullname'],
             "email" => $user['email'],
             "role" => $user['role']
        ];
    // Điều hướng theo vai trò
        switch ($user['role']) {
            case 'admin':
                header("Location: index.php?controller=admin&action=dashboard");
                break;

            case 'teacher':
                header("Location: index.php?controller=instructor&action=dashboard");
                break;

            case 'student':
                header("Location: index.php?controller=student&action=dashboard");
                break;

            default:
                header("Location: index.php");
                break;
        }
    }
}