<?php
require_once "/../models/Enrollment.php";

class EnrollmentController {
    
    public function register() {
        if (!isset($_GET['courseId']) || !isset($_GET['userId'])) {
            die("Thiếu tham số.");
        }

        $enrollModel = new Enrollment();
        $result = $enrollModel->registerCourse($_GET['courseId'], $_GET['userId']);

        if ($result)
            echo "Đăng ký thành công!";
        else
            echo "Lỗi đăng ký!";
    }

    public function myCourses() {
        $studentId = $_SESSION['user_id'];

        $enrollModel = new Enrollment();
        $myCourses = $enrollModel->getMyCourses($studentId);

        include "views/student/my_courses.php";
    }

    public function progress() {
        $studentId = $_SESSION['user_id'];
        $courseId = $_GET['courseId'];

        $enrollModel = new Enrollment();
        $progress = $enrollModel->getProgress($courseId, $studentId);

        include "views/student/course_progress.php";
    }
}
