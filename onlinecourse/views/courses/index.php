<?php include VIEW_PATH . "/layouts/header.php"; ?>

<div class="container">
    <h1>Danh sách khóa học mới nhất</h1>

    <!-- Chỉ hiện tìm kiếm khi học viên đăng nhập -->
    <?php if (isset($_SESSION['user']) && (int)$_SESSION['user']['role'] === 0): ?>
        <form method="get" action="<?= BASE_URL ?>/course/search" class="search-filter-box">
            <input type="text" name="q" placeholder="Tìm kiếm khóa học..." 
                   value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">

            <select name="category">
                <option value="">-- Tất cả danh mục --</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id']; ?>" 
                        <?= (isset($_GET['category']) && $_GET['category'] == $cat['id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit" class="btn-search">Tìm kiếm</button>
        </form>
    <?php endif; ?>

    <?php if (!empty($courses)): ?>
        <div class="course-list">
            <?php foreach ($courses as $c): ?>
                <div class="course-item">
                    <?php if (!empty($c['image'])): ?>
                        <img src="<?= BASE_URL ?>/assets/uploads/courses/<?php echo $c['image']; ?>" alt="<?php echo htmlspecialchars($c['title']); ?>">
                    <?php else: ?>
                        <img src="<?= BASE_URL ?>/assets/images/default-course.jpg" alt="<?php echo htmlspecialchars($c['title']); ?>">
                    <?php endif; ?>

                    <h3><?php echo htmlspecialchars($c['title']); ?></h3>
                    <p><?php echo htmlspecialchars($c['description']); ?></p>
                    <a class="detail-btn" href="<?= BASE_URL ?>/course/detail/<?php echo $c['id']; ?>">Xem chi tiết</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Chưa có khóa học nào!</p>
    <?php endif; ?>
</div>
<style>
    /* Khung tìm kiếm + lọc */
.search-filter-box {
    display: flex;
    gap: 12px;
    margin: 20px 0;
    padding: 15px;
    background: #f7f7f7;
    border-radius: 8px;
    align-items: center;
    flex-wrap: wrap;
}

.search-filter-box input[type="text"],
.search-filter-box select {
    padding: 10px 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 15px;
    min-width: 180px;
}

.btn-search {
    padding: 10px 20px;
    background: #3498db;
    border: none;
    border-radius: 6px;
    color: white;
    cursor: pointer;
    font-weight: bold;
    transition: 0.25s;
}

.btn-search:hover {
    background: #2980b9;
    transform: translateY(-2px);
}

/* Danh sách khóa học */
.course-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.course-item {
    border: 1px solid #eee;
    padding: 15px;
    border-radius: 10px;
    background: white;
    transition: 0.25s;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}

.course-item:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 14px rgba(0,0,0,0.12);
}

.course-item img {
    width: 100%;
    height: 160px;
    object-fit: cover;
    border-radius: 8px;
}

.course-item h3 {
    margin: 12px 0 8px;
    font-size: 18px;
}

.detail-btn {
    display: inline-block;
    margin-top: 8px;
    background: #2ecc71;
    padding: 8px 14px;
    color: white;
    border-radius: 6px;
    text-decoration: none;
    transition: 0.25s;
    font-weight: bold;
}

.detail-btn:hover {
    background: #27ae60;
}

</style>
<?php include VIEW_PATH . "/layouts/footer.php"; ?>
