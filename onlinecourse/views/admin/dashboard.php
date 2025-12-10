<?php include VIEW_PATH . '/layouts/header.php'; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>

<div class="admin-dashboard">
    <div class="dashboard-header">
        <h1>📊 Trang quản trị</h1>
        <p>Chào mừng bạn đến hệ thống quản lý</p>
    </div>

    <div class="admin-menu">
        <a href="<?= BASE_URL ?>/admin/users" class="menu-card">
            <div class="icon">👤</div>
            <div class="text">Quản lý người dùng</div>
        </a>

        <a href="<?= BASE_URL ?>/admin/categories" class="menu-card">
            <div class="icon">📂</div>
            <div class="text">Quản lý danh mục</div>
        </a>

        <a href="<?= BASE_URL ?>/admin/reports" class="menu-card">
            <div class="icon">📈</div>
            <div class="text">Thống kê</div>
        </a>
    </div>
</div>

<?php include VIEW_PATH . '/layouts/footer.php'; ?>
