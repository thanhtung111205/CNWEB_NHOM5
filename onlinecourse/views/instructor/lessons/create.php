<?php include VIEW_PATH . "/layouts/header.php"; ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="mb-4">Thêm Bài Học Mới</h2>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <form action="<?= BASE_URL ?>/lesson/store" method="POST">
                <input type="hidden" name="course_id" value="<?= $course_id ?>">

                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề bài học <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" required 
                           placeholder="Nhập tiêu đề bài học" value="<?= $_POST['title'] ?? '' ?>">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Nội dung <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="content" name="content" rows="8" required
                              placeholder="Nhập nội dung chi tiết của bài học"><?= $_POST['content'] ?? '' ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="video_url" class="form-label">Video URL</label>
                    <input type="url" class="form-control" id="video_url" name="video_url" 
                           placeholder="https://youtube.com/watch?v=..." value="<?= $_POST['video_url'] ?? '' ?>">
                    <small class="form-text text-muted">Link video YouTube, Vimeo hoặc nền tảng video khác</small>
                </div>

                <div class="mb-3">
                    <label for="order" class="form-label">Thứ tự <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="order" name="order" min="1" required
                           placeholder="1" value="<?= $_POST['order'] ?? 1 ?>">
                    <small class="form-text text-muted">Thứ tự hiển thị của bài học trong khóa học</small>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Thêm bài học
                    </button>
                    <a href="<?= BASE_URL ?>/lesson/manage?course_id=<?= $course_id ?>" class="btn btn-secondary">
                        <i class="bi bi-x-lg"></i> Hủy
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include VIEW_PATH . "/layouts/footer.php"; ?>
