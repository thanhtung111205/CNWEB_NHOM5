<?php
// --- controllers/HomeController.php ---
require_once "onlinecourse/models/Course.php";
require_once "onlinecourse/models/Category.php";
require_once "onlinecourse/models/Enrollment.php";
require_once "onlinecourse/models/Lesson.php";;


class HomeController {

    private $courseModel;
    private $categoryModel;
    private $enrollModel;
    private $lessonModel;

    public function __construct() {
        $this->courseModel   = new Course();
        $this->categoryModel = new Category();
        $this->enrollModel   = new Enrollment();
        $this->lessonModel   = new Lesson();
    }

    // Trang chủ — hiển thị danh sách khóa học + filter
    public function index() {
        $filters = [];

        if (!empty($_GET['category'])) {
            $filters['category_id'] = (int)$_GET['category'];
        }
        if (!empty($_GET['q'])) {
            $filters['q'] = trim($_GET['q']);
        }

        $courses     = $this->courseModel->all($filters);
        $categories  = $this->categoryModel->all();

        include "onlinecourse/views/home/index.php";
    }

    // Chi tiết khóa học
    public function detail() {
        if (!isset($_GET['id'])) die("Thiếu ID khóa học.");

        $courseId = $_GET['id'];

        $course  = $this->courseModel->find($courseId);
        $lessons = $this->lessonModel->getByCourse($courseId);

        $userId = $_SESSION['user_id'] ?? null;

        $isEnrolled = $userId ? $this->enrollModel->isEnrolled($userId, $courseId) : false;
        $progress   = $isEnrolled ? $this->enrollModel->getProgress($userId, $courseId) : null;

        include "onlinecourse/views/courses/detail.php";
    }

    // Tìm kiếm khóa học
    public function search() {
        $q = $_GET['q'] ?? "";
        $courses = $this->courseModel->search($q);

        include "onlinecourse/views/courses/search.php";
    }
}
