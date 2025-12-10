<?php include VIEW_PATH . '/layouts/header.php'; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>
<div class="main-wrapper">
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
</div>

<style>
    /* Nội dung hiển thị bên phải sidebar */
.main-wrapper {
    margin-left: 260px;   /* đúng bằng chiều rộng sidebar */
    padding: 20px;
    margin-top: 90px;     /* tránh bị header đè */
}

/* Cho các item khóa học hiển thị đẹp hơn */
.main-wrapper .container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 25px;
    padding: 10px;
}

.course-item {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    padding: 15px;
    transition: 0.25s ease;
}

.course-item img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 10px;
}

.course-item h3 {
    margin-top: 12px;
    color: #4A3AFF;     /* màu tím đẹp đồng bộ sidebar */
}

.course-item p {
    color: #555;
    font-size: 14px;
}

.detail-btn {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 14px;
    background: #6a5de8;
    color: white;
    border-radius: 6px;
    text-decoration: none;
    transition: 0.2s;
}

.detail-btn:hover {
    background: #584bd9;
}
h2{
    text-align: center;
}
</style>

<?php include VIEW_PATH . '/layouts/footer.php'; ?>