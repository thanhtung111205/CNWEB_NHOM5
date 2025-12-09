<?php include VIEW_PATH . "/layouts/header.php"; ?>

<h1><?= $course['title']; ?></h1>
<img src="<?= BASE_URL ?>/assets/uploads/courses/<?= $course['image']; ?>" width="300">
<p><?= $course['description']; ?></p>
<p><strong>Giá:</strong> <?= $course['price']; ?> VND</p>
<p><strong>Thời lượng:</strong> <?= $course['duration_weeks']; ?> tuần</p>

<?php if (isset($_SESSION['user'])): ?>

    <?php if ((int)$_SESSION['user']['role'] === 0): ?>
        <!-- Vai trò sinh viên mới được đăng ký -->

        <?php if (!$isEnrolled): ?>
            <form method="post" action="<?= BASE_URL ?>/enrollment/register">
                <input type="hidden" name="course_id" value="<?= $course['id'] ?>">
                <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>">
                <button class="enroll-btn">Đăng ký khóa học</button>
            </form>
        <?php else: ?>
            <p style="color: #1e8449; font-weight: bold;">Bạn đã đăng ký khóa học này ✔</p>
        <?php endif; ?>
        <a class="back-link" href="<?= BASE_URL ?>/enrollment/myCourses">
            <button class="btn btn-primary">⬅ Quay lại khóa học của tôi</button>
        </a>
    <?php endif; ?>

<?php endif; ?>
<style>
       .enroll-btn {
    background: #28a745;
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.25s ease;
}

.enroll-btn:hover {
    background: #218838;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}

.enroll-btn:active {
    transform: scale(0.97);
}

</style>
<?php include VIEW_PATH . "/layouts/footer.php"; ?>
