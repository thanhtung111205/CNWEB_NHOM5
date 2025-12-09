<div class="sidebar">
    <div class="user-box">
        <h3><strong><?= $_SESSION['user']['name'] ?></strong></h3>
        <span>Giảng viên</span>
    </div>

    <ul class="menu">
        <li>
            <a href="<?= BASE_URL ?>/course/dashboard"><i class="icon">📊</i> Dashboard</a>
        </li>

        <li>
            <a href="<?= BASE_URL ?>/course/my_courses"><i class="icon">📚</i> Khóa Học Của Tôi</a>
        </li>

        <li>
            <a href="<?= BASE_URL ?>/course/create"><i class="icon">➕</i> Tạo Khóa Học Mới</a>
        </li>

        <p class="menu-title">QUẢN LÝ</p>

        <li>
            <a href="<?= BASE_URL ?>/student/list"><i class="icon">👥</i> Danh Sách Học Viên</a>
        </li>

        <p class="menu-title">TÀI KHOẢN</p>

        <li>
            <a href="<?= BASE_URL ?>/auth/logout"><i class="icon">🚪</i> Đăng Xuất</a>
        </li>
    </ul>
</div>
