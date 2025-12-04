<?php include "./views/layouts/header.php"; ?>

<div class="login-container">
    <h2>Đăng nhập</h2>

    <?php if (!empty($_SESSION['error'])): ?>
        <p style="color:red"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>

    <form action="index.php?controller=auth&action=login" method="POST">
        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Mật khẩu:</label>
        <input type="password" name="password" required>

        <button type="submit">Đăng nhập</button>
    </form>
</div>

<?php include "./views/layouts/footer.php"; ?>