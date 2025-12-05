<?php
class Database {
<<<<<<< HEAD
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
=======
    private $host="localhost";
    private $db_name="onlinecourse";
    private $username = "root";
    private $password = ""; 
    public $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8",
                 $this->username,
                $this->password
             );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
        }
         return $this->conn;
 }
}
?>
>>>>>>> 000e82de846b3fe8921c7103e24587b3d91b64e1
