<?php

class Category {
    private $conn;
    private $table = "categories";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->table}";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $description) {
        $sql = "INSERT INTO {$this->table}(name, description, created_at)
                VALUES(?, ?, NOW())";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name, $description]);
    }

    public function update($id, $name, $description) {
        $sql = "UPDATE {$this->table} SET name=?, description=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name, $description, $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
