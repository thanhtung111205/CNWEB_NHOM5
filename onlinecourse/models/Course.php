<?php

class Course {
    private $conn;
    private $table = "courses";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Lấy tất cả khóa học
    public function getAll() {
        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy khóa học theo giảng viên
    public function getByInstructor($instructor_id) {
        $sql = "SELECT * FROM {$this->table} WHERE instructor_id = :id ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $instructor_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm khóa học
    public function create($data) {
        $sql = "INSERT INTO {$this->table} 
                (title, description, instructor_id, category_id, price, duration_weeks, level, image)
                VALUES (:title, :description, :instructor_id, :category_id, :price, :duration_weeks, :level, :image)";
        
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    // Lấy 1 khóa học
    public function get($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cập nhật
    public function update($data) {
        $sql = "UPDATE {$this->table} SET
                title=:title, description=:description, category_id=:category_id,
                price=:price, duration_weeks=:duration_weeks, level=:level, image=:image 
                WHERE id=:id";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    // Xóa
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute(['id'=>$id]);
    }
}
