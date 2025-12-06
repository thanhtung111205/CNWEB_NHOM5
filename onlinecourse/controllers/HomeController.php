<?php


require_once CONFIG_PATH . '/Database.php';
require_once MODEL_PATH . '/Course.php';

class HomeController {
    private $course;

    public function __construct()
    {
        // Kết nối DB
        $database = new Database();
        $db = $database->connect();

        // Gọi model
        $this->course = new Course($db);
    }

    // Trang chủ
    public function index()
    {
        // Lấy danh sách khóa học mới nhất
        $courses = $this->course->getAll();

        // Đưa dữ liệu vào view
        require_once VIEW_PATH . '/home/index.php';
    }
    // =====================
    // DASHBOARD STUDENT
    // =====================
    public function studentDashboard()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 0) {
            die("Bạn không có quyền truy cập");
        }

        require_once VIEW_PATH . "/student/dashboard.php";
    }

    // =====================
    // DASHBOARD INSTRUCTOR
    // =====================
    public function instructorDashboard()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
            die("Bạn không có quyền truy cập");
        }

        require_once VIEW_PATH . "/instructor/dashboard.php";
    }
}
