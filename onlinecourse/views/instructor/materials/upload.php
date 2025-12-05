<?php include VIEW_PATH . "/layouts/header.php"; ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="mb-4">Upload Tài Liệu Học Tập</h2>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body">
                    <form action="<?= BASE_URL ?>/material/store" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="lesson_id" value="<?= $lesson_id ?>">
                        <input type="hidden" name="course_id" value="<?= $course_id ?>">

                        <div class="mb-4">
                            <label for="file" class="form-label">Chọn tài liệu <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="file" name="file" required>
                            
                            <div class="mt-3">
                                <p class="mb-2"><strong>Định dạng file được hỗ trợ:</strong></p>
                                <ul class="list-unstyled">
                                    <li><i class="bi bi-file-earmark-pdf text-danger"></i> PDF (.pdf)</li>
                                    <li><i class="bi bi-file-earmark-word text-primary"></i> Word (.doc, .docx)</li>
                                    <li><i class="bi bi-file-earmark-ppt text-warning"></i> PowerPoint (.ppt, .pptx)</li>
                                    <li><i class="bi bi-file-earmark-excel text-success"></i> Excel (.xls, .xlsx)</li>
                                </ul>
                                <p class="text-muted small mt-2">
                                    <i class="bi bi-info-circle"></i> Kích thước tối đa: 10MB
                                </p>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-upload"></i> Upload tài liệu
                            </button>
                            <a href="<?= BASE_URL ?>/lesson/manage?course_id=<?= $course_id ?>" class="btn btn-secondary">
                                <i class="bi bi-x-lg"></i> Hủy
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include VIEW_PATH . "/layouts/footer.php"; ?>
