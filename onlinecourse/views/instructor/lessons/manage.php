<?php include VIEW_PATH . "/layouts/header.php"; ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Quản Lý Bài Học: <?= htmlspecialchars($course['title']) ?></h2>
        <div>
            <a href="<?= BASE_URL ?>/lesson/create?course_id=<?= $course_id ?>" class="btn btn-success">
                <i class="bi bi-plus-lg"></i> Thêm bài học
            </a>
            <a href="<?= BASE_URL ?>/course/manage" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Quay lại
            </a>
        </div>
    </div>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['success']; unset($_SESSION['success']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (empty($lessons)): ?>
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> Chưa có bài học nào. Hãy thêm bài học đầu tiên!
        </div>
    <?php else: ?>
        <div class="accordion" id="lessonsAccordion">
            <?php foreach ($lessons as $index => $lesson): ?>
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header" id="heading<?= $lesson['id'] ?>">
                        <button class="accordion-button <?= $index > 0 ? 'collapsed' : '' ?>" type="button" 
                                data-bs-toggle="collapse" data-bs-target="#collapse<?= $lesson['id'] ?>" 
                                aria-expanded="<?= $index == 0 ? 'true' : 'false' ?>">
                            <strong>Bài <?= $lesson['order'] ?>:</strong> &nbsp; <?= htmlspecialchars($lesson['title']) ?>
                        </button>
                    </h2>
                    <div id="collapse<?= $lesson['id'] ?>" 
                         class="accordion-collapse collapse <?= $index == 0 ? 'show' : '' ?>">
                        <div class="accordion-body">
                            <div class="mb-3">
                                <h5>Nội dung:</h5>
                                <p><?= nl2br(htmlspecialchars($lesson['content'])) ?></p>
                            </div>

                            <?php if (!empty($lesson['video_url'])): ?>
                                <div class="mb-3">
                                    <h5>Video URL:</h5>
                                    <a href="<?= htmlspecialchars($lesson['video_url']) ?>" target="_blank">
                                        <?= htmlspecialchars($lesson['video_url']) ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="mb-3">
                                <h5>Tài liệu đính kèm:</h5>
                                <?php if (empty($lesson['materials'])): ?>
                                    <p class="text-muted">Chưa có tài liệu nào</p>
                                <?php else: ?>
                                    <ul class="list-group">
                                        <?php foreach ($lesson['materials'] as $material): ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="bi bi-file-earmark-<?= $material['file_type'] ?>"></i>
                                                    <a href="<?= $material['file_path'] ?>" target="_blank">
                                                        <?= htmlspecialchars($material['filename']) ?>
                                                    </a>
                                                    <span class="badge bg-secondary"><?= strtoupper($material['file_type']) ?></span>
                                                </div>
                                                <a href="<?= BASE_URL ?>/material/delete?id=<?= $material['id'] ?>&course_id=<?= $course_id ?>" 
                                                   class="btn btn-sm btn-danger"
                                                   onclick="return confirm('Bạn có chắc muốn xóa tài liệu này?')">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                <a href="<?= BASE_URL ?>/material/upload?lesson_id=<?= $lesson['id'] ?>&course_id=<?= $course_id ?>" 
                                   class="btn btn-sm btn-outline-primary mt-2">
                                    <i class="bi bi-upload"></i> Upload tài liệu
                                </a>
                            </div>

                            <div class="d-flex gap-2">
                                <a href="<?= BASE_URL ?>/lesson/edit?id=<?= $lesson['id'] ?>" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Sửa
                                </a>
                                <a href="<?= BASE_URL ?>/lesson/delete?id=<?= $lesson['id'] ?>&course_id=<?= $course_id ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Bạn có chắc muốn xóa bài học này?')">
                                    <i class="bi bi-trash"></i> Xóa
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php include VIEW_PATH . "/layouts/footer.php"; ?>
