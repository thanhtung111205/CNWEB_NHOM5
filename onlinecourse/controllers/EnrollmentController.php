<?php
require_once MODEL_PATH.'/Enrollment.php';
require_once MODEL_PATH.'/Course.php';
require_once MODEL_PATH.'/Lesson.php';

class EnrollmentController {
    
    public function register() {
    $courseId = $_POST['course_id'];
    $studentId = $_POST['user_id'];

    $model = new Enrollment();
    $model->registerCourse($courseId, $studentId);

    header("Location: " . BASE_URL . "/enrollment/myCourses");
    }

    public function myCourses() {
        $studentId = $_SESSION['user']['id'];

        $enrollModel = new Enrollment();
        $myCourses = $enrollModel->getMyCourses($studentId);

        include VIEW_PATH."/student/my_courses.php";
    }
    public function progressList()
{
    $studentId = $_SESSION['user']['id'];

    require_once MODEL_PATH."/Enrollment.php";
    $enrollModel = new Enrollment();

    // Lấy tất cả khóa học + tiến độ
    $myCourses = $enrollModel->getProgress($studentId);

    require VIEW_PATH."/student/course_progress.php";
}

    

}

