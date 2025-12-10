
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css"> 

    <style>
        /* CSS MỚI BẮT ĐẦU */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            display: flex;
            flex-direction: column; /* Đảm bảo cả form và link nằm trên cùng một cột */
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: #333;
        }

        .login-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
            text-align: center;
            margin-bottom: 20px; /* Thêm khoảng cách với link đăng ký */
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
        }

        label {
            text-align: left;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
            font-size: 0.95em;
        }

        input[type="email"],
        input[type="password"] {
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1em;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #9b59b6;
            box-shadow: 0 0 5px rgba(155, 89, 182, 0.5);
            outline: none;
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
            margin-top: 10px;
            transition: background-color 0.3s ease, transform 0.1s;
        }

        button[type="submit"]:hover {
            background-color: #8e44ad;
            transform: translateY(-2px);
        }

        /* Thông báo lỗi */
        .login-container > p {
            padding: 10px;
            border-radius: 5px;
            background-color: #ffe5e5;
            border: 1px solid #ff0000;
            margin-bottom: 15px;
            font-weight: 500;
            text-align: left;
        }
/* Liên kết đăng ký */
        .register-link {
            color: #ffffff;
            text-align: center;
            font-size: 1em;
            font-weight: 500;
        }

        .register-link a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
            border-bottom: 2px solid transparent; /* Tạo hiệu ứng gạch chân */
            padding-bottom: 2px;
        }

        .register-link a:hover {
            color: #f0f0f0;
            border-bottom-color: #f0f0f0;
        }

        /* Responsive */
        @media (max-width: 500px) {
            .login-container {
                margin: 20px;
                padding: 30px 20px;
                max-width: 90%;
            }
        }
        /* CSS MỚI KẾT THÚC */
    </style>
</head>
<body>

<div class="login-container">
    <h2>Đăng nhập</h2>

    <?php if (!empty($_SESSION['error'])): ?>
        <p style="color:red"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>

    <form action="<?= BASE_URL ?>/auth/login" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Đăng nhập</button>
    </form>
</div>
<p class="register-link">Bạn chưa có tài khoản? 
    <a href="<?= BASE_URL ?>/auth/registerPage">Đăng ký ngay</a>
</p>
</body>
</html>