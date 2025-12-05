<?php

require_once CONFIG_PATH . '/Database.php';
require_once MODEL_PATH . '/Material.php';
require_once MODEL_PATH . '/Lesson.php';
require_once MODEL_PATH . '/Course.php';

class MaterialController {
    private $material;
    private $lesson;
    private $course;

    public function __construct()
    {
        $db = (new Database())->connect();
        $this->material = new Material($db);
        $this->lesson = new Lesson($db);
        $this->course = new Course($db);
    }

    // Hiển thị form upload tài liệu
    public function upload() 
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 1) {
            header("Location: /onlinecourse/auth/login");
            exit;
        }

        $lesson_id = $_GET['lesson_id'] ?? null;
        $course_id = $_GET['course_id'] ?? null;

        if (!$lesson_id || !$course_id) {
            echo "Thiếu thông tin!";
            return;
        }

        // Kiểm tra quyền
        $lesson = $this->lesson->get($lesson_id);
        if ($lesson) {
            $course = $this->course->get($lesson['course_id']);
            if (!$course || $course['instructor_id'] != $_SESSION['user_id']) {
                echo "Bạn không có quyền upload tài liệu cho bài học này!";
                return;
            }
        } else {
            echo "Bài học không tồn tại!";
            return;
        }

        require_once VIEW_PATH . '/instructor/materials/upload.php';
    }

    // Xử lý upload tài liệu
    public function store()
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 1) {
            header("Location: /onlinecourse/auth/login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: /onlinecourse/");
            exit;
        }

        $lesson_id = $_POST['lesson_id'] ?? null;
        $course_id = $_POST['course_id'] ?? null;

        if (!$lesson_id || !$course_id) {
            $_SESSION['error'] = "Thiếu thông tin!";
            header("Location: /onlinecourse/lesson/manage?course_id=" . $course_id);
            exit;
        }

        // Validate file upload
        if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['error'] = "Vui lòng chọn file để upload!";
            header("Location: /onlinecourse/material/upload?lesson_id=" . $lesson_id . "&course_id=" . $course_id);
            exit;
        }

        $file = $_FILES['file'];

        // Validate file type
        $allowed_types = ['pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed_types)) {
            $_SESSION['error'] = "File không hợp lệ! Chỉ chấp nhận: " . implode(', ', $allowed_types);
            header("Location: /onlinecourse/material/upload?lesson_id=" . $lesson_id . "&course_id=" . $course_id);
            exit;
        }

        // Validate file size (max 10MB)
        $max_size = 10 * 1024 * 1024; // 10MB
        if ($file['size'] > $max_size) {
            $_SESSION['error'] = "File quá lớn! Kích thước tối đa là 10MB.";
            header("Location: /onlinecourse/material/upload?lesson_id=" . $lesson_id . "&course_id=" . $course_id);
            exit;
        }

        // Sanitize filename
        $original_name = $file['name'];
        $safe_name = preg_replace("/[^a-zA-Z0-9._-]/", "_", $original_name);
        $new_name = time() . "_" . $safe_name;
        
        $upload_dir = ROOT_PATH . "/assets/uploads/materials/";
        
        // Tạo thư mục nếu chưa có
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        $target_path = $upload_dir . $new_name;

        // Upload file
        if (move_uploaded_file($file['tmp_name'], $target_path)) {
            
            // Lưu vào database
            $data = [
                'lesson_id' => $lesson_id,
                'filename' => $original_name,
                'file_path' => "/onlinecourse/assets/uploads/materials/" . $new_name,
                'file_type' => $ext
            ];

            if ($this->material->create($data)) {
                $_SESSION['success'] = "Upload tài liệu thành công!";
            } else {
                // Xóa file nếu lưu DB thất bại
                unlink($target_path);
                $_SESSION['error'] = "Có lỗi khi lưu thông tin tài liệu!";
            }

        } else {
            $_SESSION['error'] = "Có lỗi khi upload file!";
        }

        header("Location: /onlinecourse/lesson/manage?course_id=" . $course_id);
        exit;
    }

    // Xóa tài liệu
    public function delete()
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 1) {
            header("Location: /onlinecourse/auth/login");
            exit;
        }

        $id = $_GET['id'] ?? null;
        $course_id = $_GET['course_id'] ?? null;

        if (!$id || !$course_id) {
            $_SESSION['error'] = "Thiếu thông tin!";
            header("Location: /onlinecourse/lesson/manage?course_id=" . $course_id);
            exit;
        }

        // Lấy thông tin material để xóa file
        $material = $this->material->get($id);
        
        if ($material) {
            // Xóa file vật lý
            $file_path = ROOT_PATH . str_replace("/onlinecourse", "", $material['file_path']);
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            // Xóa trong DB
            if ($this->material->delete($id)) {
                $_SESSION['success'] = "Xóa tài liệu thành công!";
            } else {
                $_SESSION['error'] = "Có lỗi khi xóa tài liệu!";
            }
        }

        header("Location: /onlinecourse/lesson/manage?course_id=" . $course_id);
        exit;
    }
}

