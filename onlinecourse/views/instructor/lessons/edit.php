<?php include VIEW_PATH . "/layouts/header.php"; ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="mb-4">Chỉnh Sửa Bài Học</h2>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <form action="<?= BASE_URL ?>/lesson/update" method="POST">
                <input type="hidden" name="id" value="<?= $lesson['id'] ?>">
                <input type="hidden" name="course_id" value="<?= $lesson['course_id'] ?>">

                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề bài học <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" required 
                           value="<?= htmlspecialchars($lesson['title']) ?>">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Nội dung <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="content" name="content" rows="8" required><?= htmlspecialchars($lesson['content']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="video_url" class="form-label">Video URL</label>
                    <input type="url" class="form-control" id="video_url" name="video_url" 
                           value="<?= htmlspecialchars($lesson['video_url']) ?>">
                    <small class="form-text text-muted">Link video YouTube, Vimeo hoặc nền tảng video khác</small>
                </div>

                <div class="mb-3">
                    <label for="order" class="form-label">Thứ tự <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="order" name="order" min="1" required
                           value="<?= $lesson['order'] ?>">
                    <small class="form-text text-muted">Thứ tự hiển thị của bài học trong khóa học</small>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Cập nhật
                    </button>
                    <a href="<?= BASE_URL ?>/lesson/manage?course_id=<?= $lesson['course_id'] ?>" class="btn btn-secondary">
                        <i class="bi bi-x-lg"></i> Hủy
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include VIEW_PATH . "/layouts/footer.php"; ?>
