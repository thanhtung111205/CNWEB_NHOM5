<?php include VIEW_PATH . "/layouts/header.php"; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>
<div class="course-detail">

    <h1><?= $course['title']; ?></h1>

    <img src="<?= BASE_URL ?>/assets/uploads/courses/<?= $course['image']; ?>">

    <p><?= $course['description']; ?></p>

    <p><strong>Giá:</strong> <?= number_format($course['price']); ?> VND</p>
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
                <p style="color: #1e8449; font-weight: bold;">
                    Bạn đã đăng ký khóa học này ✔
                </p>
            <?php endif; ?>

            <div class="back-btn-wrap">
                <a href="<?= BASE_URL ?>/course/index">
                    <button class="btn-back">Quay lại</button>
                </a>
            </div>

        <?php endif; ?>

    <?php endif; ?>

</div>

<style>
    /* Layout tổng khi có sidebar */
.course-detail {
    margin-left: 270px;   /* đẩy sang phải tránh sidebar */
    padding: 20px;
    max-width: 800px;
}

/* Tiêu đề */
.course-detail h1 {
    margin-bottom: 20px;
    color: #333;
}

/* Ảnh khóa học */
.course-detail img {
    width: 100%;
    max-width: 350px;
    border-radius: 10px;
    margin-bottom: 20px;
}

/* Mô tả & thông tin */
.course-detail p {
    font-size: 16px;
    line-height: 1.5;
    color: #444;
    margin-bottom: 10px;
}

/* Nút đăng ký */
.enroll-btn {
    background: #28a745;
    color: #fff;
    padding: 10px 18px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    margin-top: 10px;
}
.enroll-btn:hover {
    background: #1e7e34;
}

/* Wrap nút quay lại */
.course-detail .back-btn-wrap {
    display: flex;
    justify-content: flex-start; /* ĐẨY SANG PHẢI */
    margin-top: 20px;
}

/* Nút quay lại */
.btn-back {
    background: #6a5de8;
    color: #fff;
    padding: 10px 18px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
}

.btn-back:hover {
    background: #5848d6;
}

/* Bỏ gạch chân thẻ <a> */
.course-detail a {
    text-decoration: none;
}



</style>
<?php include VIEW_PATH . "/layouts/footer.php"; ?>
