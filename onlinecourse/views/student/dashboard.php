<?php include VIEW_PATH . '/layouts/header.php'; ?>

<div class="container">
    <h1>Trang học viên</h1>
    <p>Xin chào, <strong><?= $_SESSION['user']['name'] ?></strong></p>
    
    <h2>Khóa học của bạn</h2>
    
    <a href="<?= BASE_URL ?>/student/my_courses">Xem khóa học của tôi</a>
    <a href="<?= BASE_URL ?>/course/index">Khám phá khóa học mới</a>
</div>

<?php include VIEW_PATH . '/layouts/footer.php'; ?>