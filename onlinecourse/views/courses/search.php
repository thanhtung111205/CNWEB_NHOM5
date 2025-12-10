<?php include VIEW_PATH . "/layouts/header.php"; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>
<div class="main-content">

<h2>🔎 Kết quả tìm kiếm khóa học</h2>

<form method="get" action="<?= BASE_URL ?>/course/search" style="margin-bottom:20px">

    <input type="text"
           name="q"
           placeholder="Nhập tên khóa học..."
           value="<?= htmlspecialchars($filters['q']) ?>">

    <select name="category">
        <option value="">-- Tất cả danh mục --</option>

        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat['id'] ?>"
                <?= ($filters['category_id'] == $cat['id']) ? 'selected' : '' ?>>
                <?= $cat['name'] ?>
            </option>
        <?php endforeach; ?>

    </select>

    <button type="submit">Tìm kiếm</button>
</form>

<hr>

<h3>Kết quả:</h3>

<ul>
    <?php if (!empty($courses)): ?>
        <div class="courses">
        <?php foreach ($courses as $c): ?>
            <div class="course-item">

                <h3><?= $c['title'] ?></h3>

                <a class="detail-btn" 
                   href="<?= BASE_URL ?>/course/detail?id=<?= $c['id'] ?>">
                    Xem chi tiết
                </a>

            </div>
        <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Không tìm thấy khóa học nào phù hợp.</p>
    <?php endif; ?>
</ul>

</div>

<style>
/* ======= SEARCH BAR ======= */
.search-box {
    margin: 20px auto;
    display: flex;
    gap: 10px;
    justify-content: center;
}

.search-box input, 
.search-box select {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    min-width: 200px;
}

.search-box button {
    padding: 10px 20px;
    background: #3498db;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}
.search-box button:hover {
    background: #2980b9;
}

/* ======= COURSE GRID ======= */
.courses {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 25px;
}

.course-item {
    background: #fff;
    padding: 18px;
    border-radius: 10px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
    text-align: center;
    transition: 0.25s;
}

.course-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.course-item h3 {
    font-size: 20px;
    margin-bottom: 12px;
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

/* ĐẨY TOÀN BỘ NỘI DUNG XUỐNG DƯỚI HEADER */
.main-content {
    margin-top: 80px;   /* chỉnh theo chiều cao header */
    padding: 20px;
}

/* Bỏ gạch dưới tất cả thẻ a */
a {
    text-decoration: none;
}

/* Course list */
.courses {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.course-item {
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 10px;
    background: #fafafa;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
}

/* Nút Xem chi tiết */
.detail-btn {
    display: inline-block;
    background: #6a5de8;
    color: white;
    padding: 8px 14px;
    border-radius: 6px;
    margin-top: 10px;
}

.detail-btn:hover {
    background: #5848d6;
}

</style>
<?php include VIEW_PATH . "/layouts/footer.php"; ?>