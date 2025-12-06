<?php

class AdminController {
    
    public function dashboard() {
        // Kiểm tra quyền admin (role = 2)
        if (!isset($_SESSION['user']) || (int)$_SESSION['user']['role'] !== 2) {
            header("Location: " . BASE_URL);
            exit;
        }
        
        require_once VIEW_PATH . '/admin/dashboard.php';
    }
}
