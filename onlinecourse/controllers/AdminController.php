<?php

class AdminController {

    private $reportModel;
    private $categoryModel;

    public function __construct() {
        // Kiểm tra quyền admin
        if (!isset($_SESSION['user']) || (int)$_SESSION['user']['role'] !== 2) {
            header("Location: " . BASE_URL);
            exit;
        }

        // Gọi model + database
        require_once "./config/Database.php";
        require_once "./models/Report.php";
        require_once "./models/Category.php";

        $db = new Database();
        $conn = $db->connect();   // <-- SỬA Ở ĐÂY

        $this->reportModel   = new Report($conn);
        $this->categoryModel = new Category($conn);
    }

    // ===================== Dashboard =====================
    public function dashboard() {
        require_once VIEW_PATH . '/admin/dashboard.php';
    }

    // ===================== Thống kê =====================
    public function statistics() {

        $totalUsers        = $this->reportModel->totalUsers();
        $totalCourses      = $this->reportModel->totalCourses();
        $activeEnrollments = $this->reportModel->activeEnrollments();
        $courseByCategory  = $this->reportModel->courseByCategory();

        require_once VIEW_PATH . '/admin/reports/statistics.php';
    }
    public function reports() {
    $this->statistics();
}

    // ===================== Danh mục =====================
    public function categories() {
        $categories = $this->categoryModel->getAll();
        require_once VIEW_PATH . '/admin/categories/list.php';
    }

    public function categoryCreate() {
        require_once VIEW_PATH . '/admin/categories/create.php';
    }

    public function categoryStore() {
        $name = $_POST['name'];
        $desc = $_POST['description'];

        $this->categoryModel->create($name, $desc);

        header("Location: ". BASE_URL . "/admin/categories"); 
    }

    public function categoryEdit() {
        $id = $_GET['id'];
        $category = $this->categoryModel->find($id);

        require_once VIEW_PATH . '/admin/categories/edit.php';
    }

    public function categoryUpdate() {
        $id   = $_POST['id'];
        $name = $_POST['name'];
        $desc = $_POST['description'];

        $this->categoryModel->update($id, $name, $desc);

        header("Location:" . BASE_URL ."/admin/categories");
    }

    public function categoryDelete() {
        $id = $_GET['id'];
        $this->categoryModel->delete($id);

        header("Location:" . BASE_URL ."/admin/categories");
    }
}
