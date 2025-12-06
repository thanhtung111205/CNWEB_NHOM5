<h2>Đăng ký tài khoản</h2>

<?php if (!empty($_SESSION['error'])): ?>
    <p style="color:red"><?= $_SESSION['error'] ?></p>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<form method="POST" action="<?= BASE_URL ?>/auth/register">

    <label>Username:</label>
    <input type="text" name="username" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" required><br><br>

    <label>Password:</label>
    <input type="password" name="password" required><br><br>

    <label>Họ tên:</label>
    <input type="text" name="fullname" required><br><br>

    <label>Vai trò:</label>
    <select name="role">
        <option value="0">Sinh viên</option>
        <option value="1">Giáo viên</option>
    </select><br><br>

    <button type="submit">Đăng ký</button>
</form>
