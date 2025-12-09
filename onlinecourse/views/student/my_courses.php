<?php include VIEW_PATH . '/layouts/header.php'; ?>
<h2>Khóa học của tôi</h2>
    <div class="container">
        <?php if(count($myCourses) > 0): ?>
            <?php foreach ($myCourses as $c): ?>
                <div class="course-item">
                    <?php if (!empty($c['image'])): ?>
                        <img src="<?= BASE_URL ?>/assets/uploads/courses/<?php echo $c['image']; ?>" alt="<?php echo htmlspecialchars($c['title']); ?>">
                    <?php else: ?>
                        <img src="<?= BASE_URL ?>/assets/images/default-course.jpg" alt="<?php echo htmlspecialchars($c['title']); ?>">
                    <?php endif; ?>

                    <h3><?php echo htmlspecialchars($c['title']); ?></h3>
                    <p><?php echo htmlspecialchars($c['description']); ?></p>
                    <a class="detail-btn" href="<?= BASE_URL ?>/course/detail/<?php echo $c['id']; ?>">Xem chi tiết</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align:center; color:#555;">Bạn chưa đăng ký khóa học nào.</p>
        <?php endif; ?>
    </div>
<?php include VIEW_PATH . '/layouts/footer.php'; ?>