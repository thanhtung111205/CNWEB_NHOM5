<?php include VIEW_PATH . '/layouts/header.php'; ?>

<div class="container">
    <h1>Danh sách khóa học mới nhất</h1>

    <?php if (!empty($courses)): ?>
        <div class="course-list">
            <?php foreach ($courses as $c): ?>
                <div class="course-item">
                    <img src="/BaiTH_Nhom5/onlinecourse/assets/uploads/courses/<?php echo $c['image']; ?>" width="200">

                    <h3><?php echo htmlspecialchars($c['title']); ?></h3>
                    <p><?php echo htmlspecialchars($c['description']); ?></p>
                    <a href="/onlinecourse/course/detail/<?php echo $c['id']; ?>">Xem chi tiết</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Chưa có khóa học nào!</p>
    <?php endif; ?>
</div>

<?php include VIEW_PATH . '/layouts/footer.php'; ?>
