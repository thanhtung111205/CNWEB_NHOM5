<?php include VIEW_PATH . "/layouts/header.php"; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>
<div class="main-create">
<div class="container">
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
</div>
<?php include VIEW_PATH . "/layouts/footer.php"; ?>
