<?php
class Report {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Tổng số người dùng
    public function totalUsers() {
        $sql = "SELECT COUNT(*) AS total FROM users";
        return $this->conn->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    // Tổng khóa học
    public function totalCourses() {
        $sql = "SELECT COUNT(*) AS total FROM courses";
        return $this->conn->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    // Số học viên đang hoạt động
    public function activeEnrollments() {
        $sql = "SELECT COUNT(*) AS total FROM enrollments WHERE status = 'active'";
        return $this->conn->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    // Thống kê khóa học theo danh mục
    public function courseByCategory() {
        $sql = "SELECT c.name, COUNT(co.id) AS total
                FROM categories c
                LEFT JOIN courses co ON c.id = co.category_id
                GROUP BY c.id";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
