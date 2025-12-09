<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
</head>

<body class="login-body">

<div class="login-wrapper">
    <div class="login-card">

        <h2 class="login-title">Đăng ký tài khoản</h2>

        <?php if (!empty($_SESSION['error'])): ?>
            <p class="login-error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <form method="POST" action="<?= BASE_URL ?>/auth/register" class="login-form">

            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" placeholder="Nhập username..." required>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" placeholder="Nhập email..." required>
            </div>

            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" placeholder="Nhập mật khẩu..." required>
            </div>

            <div class="form-group">
                <label>Họ tên:</label>
                <input type="text" name="fullname" placeholder="Nhập họ tên..." required>
            </div>

            <div class="form-group">
                <label>Vai trò:</label>
                <select name="role" class="select-input">
                    <option value="0">Sinh viên</option>
                    <option value="1">Giáo viên</option>
                </select>
            </div>

            <button type="submit" class="btn-login">Đăng ký</button>

        </form>

        <p class="login-register">
            Bạn đã có tài khoản?
            <a href="<?= BASE_URL ?>/auth/loginPage">Đăng nhập ngay</a>
        </p>

    </div>
</div>

</body>
</html>
