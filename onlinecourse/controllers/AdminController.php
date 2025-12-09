<?php
class AdminController {

    // Trang dashboard admin
    public function dashboard() {
        if (!isset($_SESSION['user']) || (int)$_SESSION['user']['role'] !== 2) {
            header("Location: " . BASE_URL);
            exit;
        }

        require_once VIEW_PATH . '/admin/dashboard.php';
    }

    // Quản lý người dùng
    public function manageUsers() {
        if (!isset($_SESSION['user']) || (int)$_SESSION['user']['role'] !== 2) {
            header("Location: " . BASE_URL);
            exit;
        }

        require_once CONFIG_PATH . "/Database.php";
        require_once MODEL_PATH . "/User.php";

        $db = (new Database())->connect();
        $userModel = new User($db);

        $users = $userModel->getAllUsers();

        require_once VIEW_PATH . "/admin/users/manage.php";
    }
    // KHÓA / MỞ KHÓA TÀI KHOẢN
    // =============================
    public function updateUser() {
        if (!isset($_SESSION['user']) || (int)$_SESSION['user']['role'] !== 2) {
            header("Location: " . BASE_URL);
            exit;
        }

        if (!isset($_POST['id']) || !isset($_POST['action'])) {
            die("Thiếu dữ liệu gửi lên");
        }

        $id = $_POST['id'];
        $action = $_POST['action'];

        require_once CONFIG_PATH . "/Database.php";
        require_once MODEL_PATH . "/User.php";

        $db = (new Database())->connect();
        $userModel = new User($db);

        if ($action === "lock") {
            // Khóa tài khoản → role = -1
            $userModel->updateRole($id, -1);
        } elseif ($action === "unlock") {
            // Mở khóa → role mặc định = 0
            $userModel->updateRole($id, 0);
        }

        header("Location: " . BASE_URL . "/admin/manageUsers");
        exit;
    }
}
