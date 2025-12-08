<?php
require_once CONFIG_PATH."/Database.php";

class Enrollment {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // ---- Đăng ký khóa học ----
    public function registerCourse($courseId, $studentId) {
        $sql = "INSERT INTO enrollments 
                (course_id, student_id, enrolled_date, status, progress)
                VALUES (?, ?, NOW(), 'active', 0)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$courseId, $studentId]);
    }

    // ---- Kiểm tra đã đăng ký chưa ----
    public function isEnrolled($studentId, $courseId) {
        $sql = "SELECT COUNT(*) FROM enrollments 
                WHERE student_id = ? AND course_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$studentId, $courseId]);
        return $stmt->fetchColumn() > 0;
    }

    // ---- Lấy khóa học đã đăng ký ----
    public function getMyCourses($studentId) {
        $sql = "SELECT c.*, e.progress, e.status
                FROM enrollments e
                JOIN courses c ON e.course_id = c.id
                WHERE e.student_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$studentId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ---- Lấy tiến độ học ----
   public function getProgress($studentId)
{
    $sql = "SELECT 
                c.id AS course_id,
                c.title,
                e.progress
            FROM enrollments e
            JOIN courses c ON e.course_id = c.id
            WHERE e.student_id = ?";
    
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$studentId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    // ---- Cập nhật tiến độ (sau này dùng cho từng bài học) ----
    public function updateProgress($courseId, $studentId, $progress) {
        $sql = "UPDATE enrollments 
                SET progress = ? 
                WHERE course_id = ? AND student_id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$progress, $courseId, $studentId]);
    }
}
?>
