<?php include VIEW_PATH . "/layouts/header.php"; ?>

<h1>Danh sách khóa học</h1>

<div class="course-list">
    <?php foreach ($courses as $c): ?>
        <div class="course-card">
            <img src="/BaiTH_Nhom5/onlinecourse/assets/uploads/courses/<?php echo $c['image']; ?>" width="200">
            <h3><?php echo $c['title']; ?></h3>
            <a href="/onlinecourse/course/detail?id=<?php echo $c['id']; ?>">Xem chi tiết</a>
        </div>
    <?php endforeach; ?>
</div>

<?php include VIEW_PATH . "/layouts/footer.php"; ?>
