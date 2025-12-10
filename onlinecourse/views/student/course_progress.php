<?php include VIEW_PATH . '/layouts/header.php'; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>
<div class="content">
<?php if (empty($myCourses)) : ?>
    <p>Bạn chưa đăng ký khóa học nào.</p>
<?php else : ?>
    <h2 class="section-title">Tiến độ học tập của bạn</h2>

    <div class="progress-wrapper">
        <?php foreach ($myCourses as $course): ?>
            <div class="course-progress-box">
                
                <h3><?= htmlspecialchars($course['title']) ?></h3>

                <!-- Thanh tiến độ -->
                <div class="progress-bar-bg">
                    <div class="progress-bar-fill" style="width: <?= intval($course['progress']) ?>%;"></div>
                </div>

                <p>Tiến độ: <strong><?= intval($course['progress']) ?>%</strong></p>

                <a href="<?= BASE_URL ?>/lesson/courseMaterials?courseId=<?= $course['course_id'] ?>">
                    <button class="btn-view">Xem bài học & tài liệu</button>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
</div>

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
/* ===== SIDEBAR ===== */
.sidebar {
    position: fixed;
    top: 70px;
    left: 0;
    width: 250px;
    height: calc(100vh - 70px);
    background: white;
    overflow-y: auto;
    border-right: 1px solid #eee;
}

/* Nội dung nằm bên phải sidebar */
.content {
    margin-left: 250px;     /* đẩy qua phải */
    margin-top: 70px;       /* tránh header */
    padding: 20px;
    max-width: calc(100% - 250px);
}

/* Tiêu đề phần tiến độ */
.section-title {
    margin-bottom: 20px;
}

/* Khung từng khóa học */
.course-progress-box {
    border: 1px solid #ccc;
    padding: 15px;
    margin-bottom: 15px;
    border-radius: 8px;
    background: #fff;
}

/* Thanh tiến độ */
.progress-bar-bg {
    background: #f1f1f1;
    width: 100%;
    height: 20px;
    border-radius: 10px;
    overflow: hidden;
    margin: 10px 0;
}

.progress-bar-fill {
    height: 100%;
    background: #4CAF50;
    transition: width 0.4s ease;
}

/* Nút xem bài học */
.btn-view {
    background: #6a5de8;
    color: #fff;
    padding: 8px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-view:hover {
    background: #5848d6;
}
h2{
    text-align: center;
}
</style>
<?php include VIEW_PATH . '/layouts/footer.php'; ?>