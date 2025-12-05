<?php
class User {
    private $conn;
    private $table = "users";
    public $id;
    public $username;
    public $email;
    public $password;
    public $fullname;
    public $role;
    public $created_at;
    public function __construct($db) {
        $this->conn = $db;
    }
    // Lấy user theo email
    public function findByEmail($email) {
        $query = "SELECT * FROM " . $this->table . " WHERE email = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}