<?php include VIEW_PATH . "/layouts/header.php"; ?>

<div class="container">
    <div class="page-header">
        <h1><i class="fas fa-edit"></i> Sửa khóa học</h1>
        <a href="<?= BASE_URL ?>/course/my_courses" class="btn">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
    </div>

    <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i> <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <form action="<?= BASE_URL ?>/course/update" method="POST" enctype="multipart/form-data" class="course-form">

        <input type="hidden" name="id" value="<?php echo $course['id']; ?>">

        <div class="form-group">
            <label><i class="fas fa-heading"></i> Tiêu đề khóa học *</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($course['title']); ?>" required>
        </div>

        <div class="form-group">
            <label><i class="fas fa-align-left"></i> Mô tả *</label>
            <textarea name="description" rows="5" required><?php echo htmlspecialchars($course['description']); ?></textarea>
        </div>

        <div class="form-group">
            <label><i class="fas fa-folder"></i> Danh mục *</label>
            <input type="number" name="category_id" value="<?php echo $course['category_id']; ?>" required>
        </div>

        <div class="form-group">
            <label><i class="fas fa-dollar-sign"></i> Giá (VNĐ) *</label>
            <input type="number" name="price" value="<?php echo $course['price']; ?>" min="0" step="1000" required>
        </div>

        <div class="form-group">
            <label><i class="fas fa-clock"></i> Thời lượng (tuần) *</label>
            <input type="number" name="duration_weeks" value="<?php echo $course['duration_weeks']; ?>" min="1" required>
        </div>

        <div class="form-group">
            <label><i class="fas fa-layer-group"></i> Cấp độ *</label>
            <select name="level" required>
                <option value="Beginner" <?php if(strtolower($course['level'])=='beginner') echo 'selected'; ?>>Beginner</option>
                <option value="Intermediate" <?php if(strtolower($course['level'])=='intermediate') echo 'selected'; ?>>Intermediate</option>
                <option value="Advanced" <?php if(strtolower($course['level'])=='advanced') echo 'selected'; ?>>Advanced</option>
            </select>
        </div>

        <div class="form-group">
            <label><i class="fas fa-image"></i> Ảnh hiện tại:</label>
            <div class="current-image">
                <?php if (!empty($course['image'])): ?>
                    <img src="<?= BASE_URL ?>/assets/uploads/courses/<?php echo $course['image']; ?>" alt="Course Image">
                <?php else: ?>
                    <div class="no-image"><i class="fas fa-image"></i> Chưa có ảnh</div>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group">
            <label><i class="fas fa-upload"></i> Thay đổi ảnh (JPG, PNG, max 5MB)</label>
            <input type="file" name="image" accept="image/*">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Lưu thay đổi
            </button>
            <a href="<?= BASE_URL ?>/course/my_courses" class="btn">
                <i class="fas fa-times"></i> Hủy
            </a>
        </div>
    </form>
</div>

<?php include VIEW_PATH . "/layouts/footer.php"; ?>
