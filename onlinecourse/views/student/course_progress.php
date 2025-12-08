<?php include VIEW_PATH . '/layouts/header.php'; ?>
<a href="<?= BASE_URL ?>/home/studentDashboard">🏠 Dashboard</a>
<?php if (empty($myCourses)) : ?>
    <p>Bạn chưa đăng ký khóa học nào.</p>
<?php else : ?>
    <h2>Tiến độ học tập của bạn</h2>

    <div style="max-width: 800px; margin: 0 auto;">
        <?php foreach ($myCourses as $course): ?>
            <div style="
                border: 1px solid #ccc;
                padding: 15px;
                margin-bottom: 15px;
                border-radius: 8px;">
                
                <h3><?= htmlspecialchars($course['title']) ?></h3>

                <!-- Thanh tiến độ -->
        <div style="background:#f1f1f1; width:100%; height:20px; border-radius:10px; overflow:hidden; margin:10px 0;"> 
            <div style="width:<?= intval($course['progress']) ?>%; height:100%; background:#4CAF50;"></div>
        </div>

                <p>Tiến độ: <strong><?= intval($course['progress']) ?>%</strong></p>

                <!-- Link xem bài học và tài liệu khóa học -->
                <a href="index.php?controller=enrollment&action=progress&course_id=<?= $course['course_id'] ?>">
                    Xem bài học →
                </a>
                <a href="index.php?controller=enrollment&action=progress&course_id=<?= $course['course_id'] ?>">
                    Xem tài liệu →
                </a>
            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?><?php include VIEW_PATH . '/layouts/footer.php'; ?>