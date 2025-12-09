<?php include VIEW_PATH . '/layouts/header.php'; ?>
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
                <a href="<?= BASE_URL ?>/lesson/courseMaterials?courseId=<?= $course['course_id'] ?>">
                    <button class="btn btn-primary">Xem bài học & tài liệu</button>
                </a>
        </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<style>
    .course-btn {
    display: inline-block;
    padding: 10px 18px;
    margin-right: 8px;
    border: none;
    border-radius: 6px;
    background-color: #3498db;
    color: white;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: 0.2s;
    text-decoration: none; /* bỏ gạch chân */
}

.course-btn:hover {
    background-color: #2980b9;
    transform: translateY(-2px);
}

.course-btn:active {
    transform: scale(0.97);
}

</style>
<?php include VIEW_PATH . '/layouts/footer.php'; ?>