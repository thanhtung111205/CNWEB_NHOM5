<?php include VIEW_PATH . '/layouts/header.php'; ?>
<style>
    .student-container {
        max-width: 900px;
        margin: 30px auto;
        padding: 20px;
    }

    .student-title {
        text-align: center;
        color: #27ae60;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .student-welcome {
        text-align: center;
        font-size: 18px;
        color: #2d3436;
        margin-bottom: 25px;
    }

    .navigation-card {
        background: #ffffff;
        border: 1px solid #dfe6e9;
        border-radius: 12px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        padding: 20px;
        transition: 0.3s ease;
    }

    .nav-title {
        text-align: center;
        font-size: 20px;
        color: #27ae60;
        margin-bottom: 20px;
        font-weight: 600;
    }

    .nav-links {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .nav-links a {
        padding: 12px 15px;
        text-decoration: none;
        background: #27ae60;
        color: white;
        border-radius: 10px;
        font-size: 15px;
        transition: 0.25s;
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 500;
    }

    .nav-links a:hover {
        background: #219150;
        transform: translateX(4px);
    }
</style>
<div class="navigation-card">
        <h3 class="nav-title">🏠 Dashboard Học Viên</h3>

        <div class="nav-links">
            <a href="<?= BASE_URL ?>/home/studentDashboard">🏠 Dashboard</a>
            <a href="<?= BASE_URL ?>/course/index">📚 Xem danh sách khóa học</a>
            <a href="<?= BASE_URL ?>/enrollment/myCourses">🎓 Khóa học của tôi</a>
            <a href="<?= BASE_URL ?>/enrollment/progressList">📊 Tiến độ học tập</a>
        </div>
</div>

<?php include VIEW_PATH . '/layouts/footer.php'; ?>