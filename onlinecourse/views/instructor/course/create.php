<?php include VIEW_PATH . "/layouts/header.php"; ?>
<?php include VIEW_PATH . "/layouts/header.php"; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>

<div class="student-main">
    <div class="page-header">
        <h1><i class="fas fa-plus-circle"></i> Thêm khóa học mới</h1>
        <a href="<?= BASE_URL ?>/course/my_courses" class="btn">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
    </div>

    <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i> <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <form action="<?= BASE_URL ?>/course/store" method="POST" enctype="multipart/form-data" class="course-form">

        <div class="form-group">
            <label><i class="fas fa-heading"></i> Tiêu đề khóa học *</label>
            <input type="text" name="title" required placeholder="Nhập tiêu đề khóa học">
        </div>

        <div class="form-group">
            <label><i class="fas fa-align-left"></i> Mô tả *</label>
            <textarea name="description" rows="5" required placeholder="Mô tả chi tiết về khóa học"></textarea>
        </div>

        <div class="form-group">
            <label><i class="fas fa-folder"></i> Danh mục *</label>
            <select name="category_id" required>
                <option value="">-- Chọn danh mục --</option>
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>

        <div class="form-group">
            <label><i class="fas fa-dollar-sign"></i> Giá (VNĐ) *</label>
            <input type="number" name="price" min="0" step="1000" required placeholder="0">
        </div>

        <div class="form-group">
            <label><i class="fas fa-clock"></i> Thời lượng (tuần) *</label>
            <input type="number" name="duration_weeks" min="1" required placeholder="Số tuần">
        </div>

        <div class="form-group">
            <label><i class="fas fa-layer-group"></i> Cấp độ *</label>
            <select name="level" required>
                <option value="">-- Chọn cấp độ --</option>
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Advanced">Advanced</option>
            </select>
        </div>

        <div class="form-group">
            <label><i class="fas fa-image"></i> Ảnh khóa học (JPG, PNG, max 5MB)</label>
            <input type="file" name="image" accept="image/*">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Tạo khóa học
            </button>
            <a href="<?= BASE_URL ?>/course/my_courses" class="btn">
                <i class="fas fa-times"></i> Hủy
            </a>
        </div>
    </form>
</div>
<style>
    /* Container chính bên phải sidebar */
.container {
    margin-left: 250px; /* bằng với chiều rộng sidebar */
    margin-top: 80px;   /* tránh header fixed 70px + khoảng cách */
    padding: 20px;
    box-sizing: border-box;
}

/* Header dashboard */
.dashboard-header h1 {
    font-size: 24px;
    margin-bottom: 5px;
}

.dashboard-header .welcome-text {
    font-size: 14px;
    color: #555;
}

/* Menu giảng viên */
.instructor-menu {
    margin: 20px 0;
}

.instructor-menu .btn {
    margin-right: 10px;
    text-decoration: none;
    padding: 8px 14px;
    border-radius: 6px;
}

.instructor-menu .btn-primary {
    background: #6a5de8;
    color: #fff;
}

.instructor-menu .btn-success {
    background: #28a745;
    color: #fff;
}

/* Table khóa học */
.table-wrapper {
    overflow-x: auto;
    margin-top: 10px;
}

.course-table {
    width: 100%;
    border-collapse: collapse;
}

.course-table th, .course-table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

.course-title i {
    margin-right: 5px;
}

.badge {
    display: inline-block;
    padding: 3px 8px;
    border-radius: 6px;
    font-size: 12px;
    color: #fff;
}

.level-beginner { background: #4CAF50; }
.level-intermediate { background: #FF9800; }
.level-advanced { background: #F44336; }

/* Action buttons */
.action-buttons a {
    display: inline-block;
    margin-right: 5px;
    padding: 5px 8px;
    border-radius: 4px;
    color: #fff;
    background: #6a5de8;
    text-decoration: none;
}

.action-buttons a:hover {
    opacity: 0.8;
}

/* Empty state */
.empty-state {
    text-align: center;
    padding: 40px 20px;
    color: #777;
}

.empty-state i {
    font-size: 48px;
    margin-bottom: 10px;
}

.empty-state h3 {
    margin-bottom: 10px;
}

.empty-state .btn-success {
    margin-top: 10px;
}

/* Responsive: khi màn hình nhỏ, đẩy sidebar thành trên */
@media screen and (max-width: 768px) {
    .container {
        margin-left: 0;
        margin-top: 150px; /* header + sidebar khi stacked */
        padding: 10px;
    }
}

</style>
<?php include VIEW_PATH . "/layouts/footer.php"; ?>
