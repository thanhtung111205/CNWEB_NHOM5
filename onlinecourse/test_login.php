<?php
// File test để set session instructor (dùng tạm khi chưa có hệ thống login)
session_start();

// Set session như instructor
$_SESSION['user_id'] = 2; // ID của instructor1 trong database
$_SESSION['role'] = 1; // 1 = Instructor
$_SESSION['username'] = 'instructor1';
$_SESSION['fullname'] = 'Giảng viên Test';

// Detect base URL
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
$script_dir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$base_url = $protocol . "://" . $host . $script_dir;

echo "✅ Đã set session thành công!<br><br>";
echo "User ID: " . $_SESSION['user_id'] . "<br>";
echo "Role: " . $_SESSION['role'] . " (Instructor)<br>";
echo "Username: " . $_SESSION['username'] . "<br><br>";

echo '<a href="' . $base_url . '/course/manage">👉 Vào trang quản lý khóa học</a><br>';
echo '<a href="' . $base_url . '/course/create">👉 Tạo khóa học mới</a><br>';
echo '<a href="' . $base_url . '/">👉 Về trang chủ</a>';
?>
