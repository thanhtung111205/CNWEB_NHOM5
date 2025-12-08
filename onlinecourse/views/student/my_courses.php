<?php include VIEW_PATH . '/layouts/header.php'; ?>
<a href="<?= BASE_URL ?>/home/studentDashboard">🏠 Dashboard</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎓Khóa học của tôi</title>
    <style>
    .container {
        max-width: 900px;
        margin: 20px auto;
        padding: 10px;
    }

    h2 {
        text-align: center;
        color: #27ae60;
        margin-bottom: 25px;
        font-weight: 700;
    }

    .course-card {
        background: #ffffff;
        border: 1px solid #dfe6e9;
        border-left: 5px solid #27ae60;
        padding: 15px 20px;
        margin-bottom: 15px;
        border-radius: 10px;
        transition: 0.3s ease;
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    }

    .course-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        border-left-color: #2ecc71;
    }

    .course-card h3 {
        margin: 0;
        color: #2d3436;
        font-size: 20px;
    }

    .progress-btn {
        display: inline-block;
        margin-top: 12px;
        padding: 8px 15px;
        background: #27ae60;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-size: 14px;
        transition: background 0.25s;
    }

    .progress-btn:hover {
        background: #219150;
    }

    p {
        font-size: 15px;
    }
</style>

</head>
<body>
    <h2>Khóa học của tôi</h2>
    <div class="container">
        <?php if(count($myCourses) > 0): ?>
            <?php foreach($myCourses as $mc): ?>
                <div class="course-card">
                    <h3><?= $mc['title'] ?></h3>
        
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align:center; color:#555;">Bạn chưa đăng ký khóa học nào.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php include VIEW_PATH . '/layouts/footer.php'; ?>