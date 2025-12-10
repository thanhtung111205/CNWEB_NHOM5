<?php include VIEW_PATH . "/layouts/header.php"; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>

<div class="student-main">
    <div class="page-header">
        <h1><i class="fas fa-plus-circle"></i> Thêm bài học mới</h1>
        <a href="<?= BASE_URL ?>/lesson/manage?course_id=<?= $course_id ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
    </div>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i>
            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <div class="form-card">
        <form action="<?= BASE_URL ?>/lesson/store" method="POST" class="lesson-form">
            <input type="hidden" name="course_id" value="<?= $course_id ?>">

            <div class="form-group">
                <label for="title">Tiêu đề bài học <span class="required">*</span></label>
                <input type="text" class="form-control" id="title" name="title" required 
                       placeholder="Nhập tiêu đề bài học" value="<?= $_POST['title'] ?? '' ?>">
            </div>

            <div class="form-group">
                <label for="content">Nội dung <span class="required">*</span></label>
                <textarea class="form-control" id="content" name="content" rows="8" required
                          placeholder="Nhập nội dung chi tiết của bài học"><?= $_POST['content'] ?? '' ?></textarea>
            </div>

            <div class="form-group">
                <label for="video_url">Video URL (tùy chọn)</label>
                <input type="url" class="form-control" id="video_url" name="video_url" 
                       placeholder="https://youtube.com/watch?v=..." value="<?= $_POST['video_url'] ?? '' ?>">
                <small class="form-text">Link video YouTube, Vimeo hoặc nền tảng video khác</small>
            </div>

            <div class="form-group">
                <label for="order">Thứ tự <span class="required">*</span></label>
                <input type="number" class="form-control" id="order" name="order" min="1" required
                       placeholder="1" value="<?= $_POST['order'] ?? 1 ?>">
                <small class="form-text">Thứ tự hiển thị của bài học trong khóa học</small>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Thêm bài học
                </button>
                <a href="<?= BASE_URL ?>/lesson/manage?course_id=<?= $course_id ?>" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Hủy
                </a>
            </div>
        </form>
    </div>
</div>

<?php include VIEW_PATH . "/layouts/footer.php"; ?>
