<?php
// models/Category.php

class Category {
    private $conn;
    private $table_name = "categories";
    
    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Lấy tất cả danh mục
     * @return PDOStatement|bool
     */
    public function readAll() {
        if ($this->conn === null) return false;

        $query = "SELECT id, name, description FROM " . $this->table_name . " ORDER BY name ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}