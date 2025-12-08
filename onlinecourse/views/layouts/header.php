<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Course</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
</head>
<body>
<header>
    <nav>
        <a href="<?= BASE_URL ?>/home/index">Trang chủ</a>
        <?php if (isset($_SESSION['user'])): ?>
            <span>Xin chào, <?= $_SESSION['user']['name'] ?>👋</span>
            <a href="<?= BASE_URL ?>/auth/logout">Đăng xuất</a>
        <?php else: ?>
            <a href="<?= BASE_URL ?>/auth/loginPage">Đăng nhập</a>
            <a href="<?= BASE_URL ?>/auth/registerPage">Đăng ký</a>
        <?php endif; ?>
    </nav>
</header>
<main>
