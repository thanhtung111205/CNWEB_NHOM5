<?php include VIEW_PATH . '/layouts/header.php'; ?>

<div class="container">
    <h1>Trang quản trị</h1>
    <p>Xin chào, <strong><?= $_SESSION['user']['name'] ?></strong></p>
       
    <?php include VIEW_PATH . "/layouts/sidebar.php"; ?>
    <div class="admin-menu">
        <a href="<?= BASE_URL ?>/admin/users">Quản lý người dùng</a>
        <a href="<?= BASE_URL ?>/admin/categories">Quản lý danh mục</a>
        <a href="<?= BASE_URL ?>/admin/reports">Thống kê</a>
    </div>
</div>

<?php include VIEW_PATH . '/layouts/footer.php'; ?>