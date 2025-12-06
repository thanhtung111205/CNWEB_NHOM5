<?php
// Test database connection
require_once __DIR__ . '/config/Database.php';

try {
    $db = new Database();
    $conn = $db->connect();
    
    if ($conn) {
        echo "✓ Kết nối database thành công!<br>";
        echo "Database name: onlinecoures<br>";
        
        // Test query
        $stmt = $conn->query("SHOW TABLES");
        $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
        echo "<br>Các bảng trong database:<br>";
        foreach ($tables as $table) {
            echo "- $table<br>";
        }
    }
} catch (Exception $e) {
    echo "✗ Lỗi kết nối: " . $e->getMessage();
}
