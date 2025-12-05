<?php

class AuthController {

    public function loginPage() {
        require_once VIEW_PATH . "/auth/login.php";
    }
    
    public function login() {
        require_once CONFIG_PATH . "/Database.php";
        require_once MODEL_PATH . "/User.php";

        $database = new Database();
        $db = $database->connect();
        $userModel = new User($db);

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userModel->findByEmail($email);
    //Kiểm tra có email không
        if (!$user) {
            $_SESSION['error'] = "Email không tồn tại!";
            header("Location: " . BASE_URL . "/auth/loginPage");
            exit;
        }
    // Kiểm tra mật khẩu
        if ($password != $user['password']) {
            $_SESSION['error'] = "Sai mật khẩu!";
            header("Location: " . BASE_URL . "/auth/loginPage");
            exit;
        }
    // Lưu session đăng nhập
        $_SESSION['user'] = [
             "id" => $user['id'],
             "name" => $user['fullname'],
             "email" => $user['email'],
             "role" => (int)$user['role']  // role là INT: 0=student, 1=teacher, 2=admin
        ];
    // Điều hướng theo vai trò
        switch ((int)$user['role']) {
            case 2:  // admin
                header("Location: " . BASE_URL . "/admin/dashboard");
                break;

            case 1:  // teacher
                header("Location: " . BASE_URL . "/instructor/dashboard");
                break;

            case 0:  // student
                header("Location: " . BASE_URL . "/student/dashboard");
                break;

            default:
                header("Location: " . BASE_URL);
                break;
        }
    }
    
    public function logout() {
        session_destroy();
        header("Location: " . BASE_URL);
        exit;
    }
}