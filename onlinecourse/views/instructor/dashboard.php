<?php include VIEW_PATH . '/layouts/header.php'; ?>

<div class="container">
    <h1>Trang giảng viên</h1>
    <p>Xin chào, <strong><?= $_SESSION['user']['name'] ?></strong></p>
    
    <h2>Khóa học của bạn</h2>
    
    <?php if (!empty($courses)): ?>
        <div class="course-list">
            <?php foreach ($courses as $course): ?>
                <div class="course-item">
                    <h3><?= htmlspecialchars($course['title']) ?></h3>
                    <p><?= htmlspecialchars($course['description']) ?></p>
                    <a href="<?= BASE_URL ?>/course/detail/<?= $course['id'] ?>">Xem chi tiết</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Bạn chưa có khóa học nào.</p>
    <?php endif; ?>
    
    <a href="<?= BASE_URL ?>/instructor/course/create" class="btn">Tạo khóa học mới</a>
</div>

<?php include VIEW_PATH . '/layouts/footer.php'; ?>