<?php include VIEW_PATH . "/layouts/header.php"; ?>
<a href="<?= BASE_URL ?>/home/studentDashboard">🏠 Dashboard</a>
<!-- <h1>Danh sách khóa học</h1>

<div class="course-list">
    <?php //foreach ($courses as $c): ?>
        <div class="course-card">
            <img src="/BaiTH_Nhom5/onlinecourse/assets/uploads/courses/<?php echo $c['image']; ?>" width="200">
            <h3><?php //echo $c['title']; ?></h3>
            <a href="/onlinecourse/course/detail?id=<?php echo $c['id']; ?>">Xem chi tiết</a>
        </div>
    <?php //endforeach; ?>
</div> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem danh sách các khóa học</title>
    <style>
    .container {
        max-width: 1000px;
        margin: 20px auto;
        padding: 10px;
    }

    h2 {
        text-align: center;
        color: #27ae60;
        font-weight: 700;
        margin-bottom: 25px;
    }

    /* Form tìm kiếm + lọc */
    form {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 12px;
        margin-bottom: 25px;
    }

    form input[type="text"] {
        width: 280px;
        padding: 10px;
        border: 1px solid #d0d0d0;
        border-radius: 8px;
        font-size: 14px;
    }

    select {
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #d0d0d0;
        font-size: 14px;
    }

    button {
        background: #27ae60;
        color: white;
        border: none;
        padding: 10px 16px;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.25s;
    }

    button:hover {
        background: #219150;
    }

    /* Danh sách khóa học */
    .courses {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .course-item {
        background: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        padding: 15px 20px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        transition: 0.3s ease;
    }

    .course-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 18px rgba(0,0,0,0.10);
    }

    .course-item h3 {
        font-size: 18px;
        color: #2d3436;
    }

    .detail-btn {
        display: inline-block;
        margin-top: 10px;
        padding: 8px 14px;
        background: #27ae60;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        transition: 0.25s;
        font-size: 14px;
    }

    .detail-btn:hover {
        background: #219150;
    }
</style>
</head>
<body>
    <h2>Danh sách khóa học</h2>

<div class="container">

    <!-- FORM TÌM KIẾM + LỌC -->
    <!-- Chuyển đến CourseController::search() -->
    <form action="<?= BASE_URL ?>/course/search" method="get">
        
        <!-- Từ khóa tìm kiếm -->
        <input type="text" 
               name="q" 
               placeholder="Tìm kiếm khóa học..." 
               value="<?= $filters['q'] ?? '' ?>">

        <!-- Dropdown danh mục -->
        <select name="category">
            <option value="">--Danh mục--</option>

            <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat['id'] ?>"
                    <?= (!empty($filters['category_id']) && $filters['category_id'] == $cat['id']) 
                        ? 'selected' 
                        : '' ?>>
                    <?= $cat['name'] ?>
                </option>
            <?php endforeach; ?>

        </select>

        <button type="submit">Tìm kiếm</button>
    </form>


    <!-- DANH SÁCH KHÓA HỌC -->
    <div class="courses">
        <?php foreach ($courses as $c): ?>
            <div class="course-item">

                <h3><?= $c['title'] ?></h3>

                <a class="detail-btn" 
                   href="<?= BASE_URL ?>/course/detail_hocvien?id=<?= $c['id'] ?>">
                    Xem chi tiết
                </a>

            </div>
        <?php endforeach; ?>
    </div>

</div>
</body>
</html>

<?php include VIEW_PATH . "/layouts/footer.php"; ?>
