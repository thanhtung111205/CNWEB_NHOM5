
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css"> 

    <style>
        /* CSS MỚI BẮT ĐẦU */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* Sử dụng cùng gradient nền với trang Đăng nhập */
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: #333;
        }

        .register-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px; /* Rộng hơn một chút vì có nhiều trường hơn */
            box-sizing: border-box;
            text-align: center;
        }

        h2 {
            margin-bottom: 30px;
            color: #333;
            font-size: 1.8em;
            border-bottom: 3px solid #9b59b6;
            display: inline-block;
            padding-bottom: 5px;
        }

        form {
            display: flex;
flex-direction: column;
            text-align: left;
        }

        label {
            margin-bottom: 8px;
            margin-top: 10px;
            font-weight: 600;
            color: #555;
            font-size: 0.95em;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1em;
            width: 100%;
            box-sizing: border-box; /* Quan trọng để padding không làm tăng chiều rộng */
            transition: border-color 0.3s, box-shadow 0.3s;
            appearance: none; /* Bỏ giao diện mặc định của select */
            background-color: #f9f9f9;
        }
        
        /* Hiệu ứng focus cho input và select */
        input:focus,
        select:focus {
            border-color: #9b59b6;
            box-shadow: 0 0 5px rgba(155, 89, 182, 0.5);
            outline: none;
        }

        /* Xử lý khoảng cách giữa các trường (thay thế <br><br> cũ) */
        input:not(:last-of-type), select {
            margin-bottom: 15px;
        }
        
        button[type="submit"] {
            background-color: #9b59b6;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1em;
            font-weight: 600;
            margin-top: 20px; /* Khoảng cách lớn hơn với trường cuối */
            transition: background-color 0.3s ease, transform 0.1s;
        }

        button[type="submit"]:hover {
            background-color: #8e44ad;
            transform: translateY(-2px);
        }

        /* Thông báo lỗi */
        .register-container > p {
            padding: 10px;
            border-radius: 5px;
            background-color: #ffe5e5;
            border: 1px solid #ff0000;
            margin-bottom: 15px;
            font-weight: 500;
            text-align: left;
        }

        /* Responsive */
        @media (max-width: 500px) {
            .register-container {
                margin: 20px;
                padding: 30px 20px;
                max-width: 90%;
            }
        }
        /* CSS MỚI KẾT THÚC */
    </style>
</head>
<body>

<div class="register-container">
    <h2>Đăng ký tài khoản</h2>

    <?php if (!empty($_SESSION['error'])): ?>
        <p style="color:red"><?= $_SESSION['error'] ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form method="POST" action="<?= BASE_URL ?>/auth/register">

        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password:</label>
<input type="password" name="password" id="password" required>

        <label for="fullname">Họ tên:</label>
        <input type="text" name="fullname" id="fullname" required>

        <label for="role">Vai trò:</label>
        <select name="role" id="role">
            <option value="0">Sinh viên</option>
            <option value="1">Giáo viên</option>
        </select>

        <button type="submit">Đăng ký</button>
    </form>
    <p class="register-link">
    <a href="<?= BASE_URL ?>/auth/loginPage">Quay lại trang Đăng nhập</a>
</p>
</div>


</body>
</html>