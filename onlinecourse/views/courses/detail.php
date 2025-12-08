<?php include VIEW_PATH . "/layouts/header.php"; ?>

<!-- <h1><?php //echo $course['title']; ?></h1>

<img src="/BaiTH_Nhom5/onlinecourse/assets/uploads/courses/<?php echo $course['image']; ?>" width="300">

<p><?php //echo $course['description']; ?></p>
<p><strong>Giá:</strong> <?php //echo $course['price']; ?> VND</p>
<p><strong>Thời lượng:</strong> <?php //echo $course['duration_weeks']; ?> tuần</p> -->
<div class="course-container">

        <h2 class="course-title"><?= $course['title'] ?></h2>

        <p class="course-description">
            <?= nl2br($course['description']) ?>
        </p>

        <?php if (!$isEnrolled): ?>
        <form method="post" action="<?= BASE_URL ?>/enrollment/register">
            <input type="hidden" name="course_id" value="<?= $course['id'] ?>">
            <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>">
            <button class="enroll-btn">Đăng ký khóa học</button>
        </form>
        <?php else: ?>
            <p style="color: #1e8449; font-weight: bold;">Bạn đã đăng ký khóa học này ✔</p>
        <?php endif; ?>

        <h3>📚 Danh sách bài học</h3>

        <ul>
            <?php foreach($lessons as $l): ?>
                <li><?= $l['title'] ?></li>
            <?php endforeach; ?>
        </ul>

        <a class="back-link" href="<?= BASE_URL ?>/course/index">
            ⬅ Quay lại danh sách khóa học
        </a>

    </div>

<?php include VIEW_PATH . "/layouts/footer.php"; ?>
