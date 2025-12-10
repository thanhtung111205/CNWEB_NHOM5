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
                <a href="<?= BASE_URL ?>/admin/categories"><i class="icon">👥</i> Quản lý danh mục</a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>/admin/reports"><i class="icon">📈</i> Thống kê hệ thống</a>
            </li>
        <?php endif; ?>


        <!-- Mục dành cho HỌC VIÊN -->
        <?php if ($_SESSION['user']['role'] == 3): ?>
            <li>
                <a href="<?= BASE_URL ?>/courses/enrolled"><i class="icon">🎓</i> Khóa học đã đăng ký</a>

            </li>
        <?php endif; ?>

    </ul>
</div>
