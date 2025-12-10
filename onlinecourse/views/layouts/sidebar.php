<div class="sidebar">
    <div class="user-box">
        <h3><strong><?= $_SESSION['user']['name'] ?></strong></h3>

        <span>
            <?php
                if ($_SESSION['user']['role'] == 2) echo "Admin";
                elseif ($_SESSION['user']['role'] == 1) echo "Giảng viên";
                else echo "Học viên";
            ?>
        </span>
    </div>

    <ul class="menu">

        <!-- Mục dành cho GIẢNG VIÊN -->
        <?php if ($_SESSION['user']['role'] == 1): ?>
            <li>
                <a href="<?= BASE_URL ?>/course/dashboard"><i class="icon">📊</i> Dashboard</a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>/course/my_courses"><i class="icon">📚</i> Khóa Học Của Tôi</a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>/course/create"><i class="icon">➕</i> Tạo Khóa Học Mới</a>
            </li>
        <?php endif; ?>


        <!-- Mục dành cho ADMIN -->
        <?php if ($_SESSION['user']['role'] == 2): ?>
            <li>
                <a href="<?= BASE_URL ?>/admin/manageUsers"><i class="icon">👥</i> Quản lý người dùng</a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>/admin/categories"><i class="icon">👥</i> Quản lý danh mục</a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>/admin/reports"><i class="icon">📈</i> Thống kê hệ thống</a>
            </li>
        <?php endif; ?>


        <!-- Mục dành cho HỌC VIÊN -->
        <?php if ($_SESSION['user']['role'] == 0): ?>
            <li>
                <a href="<?= BASE_URL ?>/course/index">📚 Xem danh sách khóa học</a>    
            </li>
            <li>
                <a href="<?= BASE_URL ?>/enrollment/myCourses">🎓 Khóa học của tôi</a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>/enrollment/progressList">📊 Tiến độ học tập</a>
            </li>
        <?php endif; ?>

    </ul>
</div>