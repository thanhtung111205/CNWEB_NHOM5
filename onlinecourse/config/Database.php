<?php
class Database {
    private $host = "127.0.0.1";
    private $db = "onlinecoures";
    private $user = "root";
    private $pass = "";
    public $conn;

    public function connect() {
        if ($this->conn) return $this->conn;

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db}",
                $this->user,
                $this->pass
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("SET NAMES utf8");

        } catch (PDOException $e) {
            echo "Lỗi kết nối DB: " . $e->getMessage();
        }

        return $this->conn;
    }
}
