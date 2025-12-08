<?php
class Lesson {
    private $conn;
    private $table = "lessons";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Lấy bài học theo khóa học
    public function getByCourse($course_id) {
        $stmt = $this->conn->prepare("SELECT * FROM lessons WHERE course_id = :course_id ORDER BY `order` ASC");
        $stmt->execute(['course_id'=>$course_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tạo bài học mới
    public function create($data) {
        $sql = "INSERT INTO lessons (course_id, title, content, video_url, `order`) 
                VALUES (:course_id, :title, :content, :video_url, :order)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    // Lấy dữ liệu 1 bài học 
    public function get($id) {
        $stmt = $this->conn->prepare("SELECT * FROM lessons WHERE id = :id");
        $stmt->execute(['id'=>$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 
    public function update($data) {
        $sql = "UPDATE lessons SET title=:title, content=:content, video_url=:video_url, `order`=:order 
                WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM lessons WHERE id = :id");
        return $stmt->execute(['id'=>$id]);
    }
}
