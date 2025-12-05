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
}
