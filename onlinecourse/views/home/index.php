<?php include VIEW_PATH . '/layouts/header.php'; ?>

<div class="container">
    <h1>Danh sách khóa học mới nhất</h1>

    <?php if (!empty($courses)): ?>
        <div class="course-list">
            <?php foreach ($courses as $c): ?>
                <div class="course-item">
                    <?php if (!empty($c['image'])): ?>
                        <img src="<?= BASE_URL ?>/assets/uploads/courses/<?php echo $c['image']; ?>" alt="<?php echo htmlspecialchars($c['title']); ?>">
                    <?php else: ?>
                        <img src="<?= BASE_URL ?>/assets/images/default-course.jpg" alt="<?php echo htmlspecialchars($c['title']); ?>">
                    <?php endif; ?>

                    <h3><?php echo htmlspecialchars($c['title']); ?></h3>
                    <p><?php echo htmlspecialchars($c['description']); ?></p>
                    <a href="<?= BASE_URL ?>/course/detail/<?php echo $c['id']; ?>">Xem chi tiết</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Chưa có khóa học nào!</p>
    <?php endif; ?>
</div>

<?php include VIEW_PATH . '/layouts/footer.php'; ?>
