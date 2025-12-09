# HƯỚNG DẪN SỬ DỤNG CHỨC NĂNG GIẢNG VIÊN

## Tổng quan
Hệ thống quản lý khóa học trực tuyến cho phép giảng viên tạo, chỉnh sửa, xóa khóa học, quản lý bài học và đăng tải tài liệu học tập.

## Các chức năng chính

### 1. QUẢN LÝ KHÓA HỌC

#### 1.1. Xem danh sách khóa học của tôi
- Truy cập: `/course/my_courses`
- Hiển thị tất cả khóa học do giảng viên tạo
- Mỗi khóa học hiển thị:
  - Ảnh đại diện
  - Tiêu đề và mô tả
  - Giá và thời lượng
  - Cấp độ (Beginner/Intermediate/Advanced)
  - Các nút thao tác: Sửa, Quản lý bài học, Xóa

#### 1.2. Tạo khóa học mới
- Truy cập: `/course/create`
- Thông tin cần nhập:
  - **Tiêu đề** (*bắt buộc): Tên khóa học
  - **Mô tả** (*bắt buộc): Mô tả chi tiết về khóa học
  - **Danh mục** (*bắt buộc): Chọn từ danh sách có sẵn
  - **Cấp độ** (*bắt buộc): Beginner/Intermediate/Advanced
  - **Giá** (*bắt buộc): Giá khóa học (VNĐ)
  - **Thời lượng** (*bắt buộc): Số tuần hoàn thành khóa học
  - **Ảnh đại diện** (tùy chọn): JPG, PNG, GIF, WEBP (tối đa 5MB)

#### 1.3. Chỉnh sửa khóa học
- Truy cập: `/course/edit?id={course_id}`
- Có thể cập nhật tất cả thông tin của khóa học
- Thay đổi ảnh đại diện (ảnh cũ sẽ bị xóa)

#### 1.4. Xóa khóa học
- Nhấn nút "Xóa" trên card khóa học
- Hệ thống sẽ yêu cầu xác nhận
- Ảnh đại diện sẽ bị xóa khỏi server

---

### 2. QUẢN LÝ BÀI HỌC

#### 2.1. Xem danh sách bài học
- Truy cập: `/lesson/manage?course_id={course_id}`
- Hiển thị tất cả bài học trong khóa học
- Mỗi bài học hiển thị:
  - Số thứ tự và tiêu đề
  - Nội dung chi tiết
  - Link video (nếu có)
  - Danh sách tài liệu đính kèm
  - Các nút: Sửa, Xóa, Upload tài liệu

#### 2.2. Thêm bài học mới
- Truy cập: `/lesson/create?course_id={course_id}`
- Thông tin cần nhập:
  - **Tiêu đề bài học** (*bắt buộc)
  - **Nội dung** (*bắt buộc): Nội dung chi tiết của bài học
  - **Video URL** (tùy chọn): Link YouTube, Vimeo...
  - **Thứ tự** (*bắt buộc): Thứ tự hiển thị trong khóa học

#### 2.3. Chỉnh sửa bài học
- Truy cập: `/lesson/edit?id={lesson_id}`
- Có thể cập nhật tất cả thông tin của bài học

#### 2.4. Xóa bài học
- Nhấn nút "Xóa" trên bài học
- Hệ thống sẽ yêu cầu xác nhận

---

### 3. QUẢN LÝ TÀI LIỆU

#### 3.1. Upload tài liệu học tập
- Truy cập: `/material/upload?lesson_id={lesson_id}&course_id={course_id}`
- Định dạng hỗ trợ:
  - PDF (.pdf)
  - Word (.doc, .docx)
  - PowerPoint (.ppt, .pptx)
  - Excel (.xls, .xlsx)
- Kích thước tối đa: 10MB

#### 3.2. Xóa tài liệu
- Nhấn nút "Xóa" bên cạnh tài liệu
- File sẽ bị xóa khỏi server và database

---

## CẤU TRÚC FILE

### Controllers
- `CourseController.php`: Xử lý logic khóa học
- `LessonController.php`: Xử lý logic bài học
- `MaterialController.php`: Xử lý logic tài liệu

### Models
- `Course.php`: Model khóa học
- `Lesson.php`: Model bài học
- `Material.php`: Model tài liệu

### Views (Giảng viên)
```
views/instructor/
├── course/
│   ├── create.php      # Form tạo khóa học
│   ├── edit.php        # Form sửa khóa học
│   └── manage.php      # Danh sách khóa học
├── lessons/
│   ├── create.php      # Form tạo bài học
│   ├── edit.php        # Form sửa bài học
│   └── manage.php      # Quản lý bài học
└── materials/
    └── upload.php      # Form upload tài liệu
```

---

## VALIDATION & BẢO MẬT

### Validation
- Tất cả input đều được validate phía server
- Kiểm tra định dạng file và kích thước
- Xác thực URL video (nếu có)
- Sanitize dữ liệu đầu vào

### Bảo mật
- Kiểm tra quyền truy cập (chỉ giảng viên mới thực hiện được)
- Kiểm tra quyền sở hữu (chỉ sửa/xóa khóa học/bài học của mình)
- Xử lý upload file an toàn
- Ngăn chặn SQL Injection, XSS

---

## THÔNG BÁO & XỬ LÝ LỖI

### Thông báo thành công
- Tạo khóa học thành công
- Cập nhật khóa học thành công
- Xóa khóa học thành công
- Tương tự cho bài học và tài liệu

### Thông báo lỗi
- Thiếu thông tin bắt buộc
- File không hợp lệ
- Không có quyền truy cập
- Lỗi upload file

---

## GIAO DIỆN

### Đặc điểm giao diện
- **Responsive**: Tương thích với mọi thiết bị
- **Modern**: Thiết kế hiện đại với card, shadow, animation
- **User-friendly**: Dễ sử dụng, trực quan
- **Icons**: Sử dụng Font Awesome 6.4.0
- **Colors**: Palette màu chuyên nghiệp
- **Form**: Form đẹp với validation trực quan

### Màu sắc chính
- Primary (Blue): #007bff
- Success (Green): #28a745
- Danger (Red): #dc3545
- Info (Cyan): #17a2b8
- Secondary (Gray): #6c757d

---

## LƯU Ý KHI SỬ DỤNG

1. **Thứ tự bài học**: Nên đánh số thứ tự hợp lý để học viên dễ theo dõi
2. **Upload ảnh**: Nên sử dụng ảnh chất lượng cao, tỉ lệ 16:9
3. **Video URL**: Đảm bảo link video công khai, có thể xem được
4. **Tài liệu**: Đặt tên file rõ ràng, dễ hiểu
5. **Nội dung bài học**: Viết rõ ràng, chi tiết, có cấu trúc

---

## HỖ TRỢ KỸ THUẬT

Nếu gặp vấn đề, vui lòng kiểm tra:
1. Đã đăng nhập với tài khoản giảng viên chưa?
2. Có quyền sở hữu khóa học/bài học không?
3. File upload có đúng định dạng và kích thước không?
4. Đã điền đầy đủ thông tin bắt buộc chưa?

---

**Phiên bản**: 1.0  
**Ngày cập nhật**: 2025
