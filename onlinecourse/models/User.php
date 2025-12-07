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
    // Tạo tài khoản mới
   public function createUser($username, $email, $password, $fullname, $role) {
    $query = "INSERT INTO " . $this->table . " (username, email, password, fullname, role)
              VALUES (:username, :email, :password, :fullname, :role)";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password); // Không hash
    $stmt->bindParam(":fullname", $fullname);
    $stmt->bindParam(":role", $role);

    return $stmt->execute();
    
    }
}