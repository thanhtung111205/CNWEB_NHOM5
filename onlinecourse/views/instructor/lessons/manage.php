<?php include VIEW_PATH . "/layouts/header.php"; ?>

<div class="container">
    <div class="page-header">
        <h1><i class="fas fa-list"></i> Quản lý bài học: <?= htmlspecialchars($course['title']) ?></h1>
        <div class="header-actions">
            <a href="<?= BASE_URL ?>/lesson/create?course_id=<?= $course_id ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Thêm bài học
            </a>
            <a href="<?= BASE_URL ?>/course/my_courses" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>
    </div>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <?= $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i>
            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <?php if (empty($lessons)): ?>
        <div class="empty-state">
            <i class="fas fa-book-open"></i>
            <h3>Chưa có bài học nào</h3>
            <p>Hãy thêm bài học đầu tiên cho khóa học này!</p>
            <a href="<?= BASE_URL ?>/lesson/create?course_id=<?= $course_id ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Thêm bài học đầu tiên
            </a>
        </div>
    <?php else: ?>
        <div class="lessons-list">
            <?php foreach ($lessons as $index => $lesson): ?>
                <div class="lesson-card">
                    <div class="lesson-header">
                        <h3>
                            <span class="lesson-number">Bài <?= $lesson['order'] ?></span>
                            <?= htmlspecialchars($lesson['title']) ?>
                        </h3>
                        <div class="lesson-actions">
                            <a href="<?= BASE_URL ?>/lesson/edit?id=<?= $lesson['id'] ?>" class="btn btn-sm btn-info" title="Chỉnh sửa">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= BASE_URL ?>/lesson/delete?id=<?= $lesson['id'] ?>&course_id=<?= $course_id ?>" 
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Bạn có chắc muốn xóa bài học này?')"
                               title="Xóa">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </div>

                    <div class="lesson-body">
                        <div class="lesson-content">
                            <h4><i class="fas fa-align-left"></i> Nội dung:</h4>
                            <p><?= nl2br(htmlspecialchars($lesson['content'])) ?></p>
                        </div>

                        <?php if (!empty($lesson['video_url'])): ?>
                            <div class="lesson-video">
                                <h4><i class="fas fa-video"></i> Video:</h4>
                                <a href="<?= htmlspecialchars($lesson['video_url']) ?>" target="_blank" class="video-link">
                                    <i class="fas fa-play-circle"></i> <?= htmlspecialchars($lesson['video_url']) ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="lesson-materials">
                            <div class="materials-header">
                                <h4><i class="fas fa-file-alt"></i> Tài liệu đính kèm:</h4>
                                <a href="<?= BASE_URL ?>/material/upload?lesson_id=<?= $lesson['id'] ?>&course_id=<?= $course_id ?>" 
                                   class="btn btn-sm btn-success">
                                    <i class="fas fa-upload"></i> Upload tài liệu
                                </a>
                            </div>
                            
                            <?php if (empty($lesson['materials'])): ?>
                                <p class="no-materials">Chưa có tài liệu nào</p>
                            <?php else: ?>
                                <ul class="materials-list">
                                    <?php foreach ($lesson['materials'] as $material): ?>
                                        <li class="material-item">
                                            <div class="material-info">
                                                <i class="fas fa-file-<?= $material['file_type'] ?>"></i>
                                                <a href="<?= $material['file_path'] ?>" target="_blank">
                                                    <?= htmlspecialchars($material['filename']) ?>
                                                </a>
                                                <span class="material-type"><?= strtoupper($material['file_type']) ?></span>
                                            </div>
                                            <a href="<?= BASE_URL ?>/material/delete?id=<?= $material['id'] ?>&course_id=<?= $course_id ?>" 
                                               class="btn btn-sm btn-danger"
                                               onclick="return confirm('Bạn có chắc muốn xóa tài liệu này?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php include VIEW_PATH . "/layouts/footer.php"; ?>
