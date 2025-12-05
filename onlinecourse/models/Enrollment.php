<?php

class Enrollment {
    private $conn;
    private $table = "enrollments";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Lấy danh sách khóa học của học viên
    public function getByStudent($student_id) {
        $sql = "SELECT e.*, c.title, c.description, c.image 
                FROM {$this->table} e 
                JOIN courses c ON e.course_id = c.id 
                WHERE e.student_id = :student_id 
                ORDER BY e.enrolled_at DESC";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":student_id", $student_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Đăng ký khóa học
    public function enroll($student_id, $course_id) {
        $sql = "INSERT INTO {$this->table} (student_id, course_id) 
                VALUES (:student_id, :course_id)";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":student_id", $student_id);
        $stmt->bindParam(":course_id", $course_id);
        return $stmt->execute();
    }
}
