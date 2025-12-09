<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Course</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
</head>
<body>
<header>
    <nav>
        
        <a href="<?= BASE_URL ?>"><i class="fas fa-home"></i> Trang chủ</a>
        <?php if (isset($_SESSION['user'])): ?>
            <?php if ((int)$_SESSION['user']['role'] === 1): ?>
                <a href="<?= BASE_URL ?>/course/my_courses"><i class="fas fa-book"></i> Khóa học của tôi</a>
            <?php endif; ?>
            <span><i class="fas fa-user"></i> Xin chào, <?= $_SESSION['user']['name'] ?></span>
            <a href="<?= BASE_URL ?>/auth/logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
        <?php else: ?>
            <a href="<?= BASE_URL ?>/auth/loginPage"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
            <a href="<?= BASE_URL ?>/auth/registerPage"><i class="fas fa-user-plus"></i> Đăng ký</a>
        <?php endif; ?>
        
    </nav>
</header>

    


    
