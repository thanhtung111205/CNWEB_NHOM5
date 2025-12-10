<?php include VIEW_PATH . '/layouts/header.php'; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>

<div class="admin-container">
    <h1>Trang quản trị</h1>
    <p>Xin chào, <strong><?= $_SESSION['user']['name'] ?></strong></p>
    
    <div class="admin-menu">
        <a href="<?= BASE_URL ?>/admin/manageUsers" class="btn-admin">Quản lý người dùng</a>
        <a href="<?= BASE_URL ?>/admin/categories" class="btn-admin">Quản lý danh mục</a>
        <a href="<?= BASE_URL ?>/admin/reports" class="btn-admin">Thống kê</a>
    </div>
</div>
<style>
    /* Container admin, tránh sidebar */
.admin-container {
    margin-left: 250px; /* đẩy sang phải bằng chiều rộng sidebar */
    margin-top: 80px;   /* tránh header fixed */
    padding: 20px;
    box-sizing: border-box;
}

/* Tiêu đề */
.admin-container h1 {
    font-size: 28px;
    margin-bottom: 10px;
}

/* Menu admin */
.admin-menu {
    margin-top: 30px;
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
}

.admin-menu .btn-admin {
    text-decoration: none;
    background: #6a5de8;
    color: #fff;
    padding: 12px 20px;
    border-radius: 6px;
    transition: 0.2s;
}

.admin-menu .btn-admin:hover {
    background: #5848d6;
}

/* Responsive cho màn hình nhỏ */
@media screen and (max-width: 768px) {
    .admin-container {
        margin-left: 0;
        margin-top: 150px; /* header + sidebar khi stacked */
        padding: 10px;
    }

    .admin-menu {
        flex-direction: column;
    }
}

</style>
<?php include VIEW_PATH . '/layouts/footer.php'; ?>
