<!-- Header -->
<header class="main-header">
    <div class="container">
        <div class="header-wrapper">

            <!-- Logo -->
            <div class="logo">
                <a href="index.php">
                    <span>EduPress</span>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="navbar">
                <ul>
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="courses.php">Courses</a></li>
                    <li><a href="registered.php">Registered Courses</a></li>
                    <li><a href="progress.php">Progress</a></li>
                    <li><a href="lessons.php">Lessons</a></li>
                </ul>
            </nav>

            <!-- Right side -->
            <div class="header-right">
                <a href="login.php" class="login">Login / Register</a>

                <button class="search-btn">
                    <i class="fa fa-search"></i>
                </button>
            </div>

        </div>
    </div>
</header>

<!-- Minimal CSS to match the UI (customize as needed) -->
<style>
    .main-header {
        width: 100%;
        background: #fff;
        padding: 15px 0;
        border-bottom: 1px solid #eee;
        position: sticky;
        top: 0;
        z-index: 999;
    }

    .main-header .container {
        width: 90%;
        margin: 0 auto;
    }

    .header-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Logo */
    .logo a {
        display: flex;
        align-items: center;
        text-decoration: none;
        font-size: 20px;
        font-weight: bold;
        color: #000;
    }

    .logo img {
        width: 30px;
        margin-right: 8px;
    }

    /* Menu */
    .navbar ul {
        display: flex;
        list-style: none;
        gap: 25px;
    }

    .navbar ul li a {
        text-decoration: none;
        color: #000;
        font-size: 14px;
        padding: 6px 0;
    }

    .navbar ul li a.active,
    .navbar ul li a:hover {
        color: #ff6600;
        border-bottom: 2px solid #ff6600;
    }

    /* Right block */
    .header-right {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .login {
        text-decoration: none;
        color: #000;
        font-size: 14px;
    }

    .search-btn {
        border: 1px solid #ff6600;
        background: transparent;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
    }
</style>

<!-- Font Awesome (icon search) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
