<?php include VIEW_PATH . '/layouts/header.php'; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">

<div class="admin-content">

    <h2>📊 Thống kê hệ thống</h2>

    <div class="stats">
        <div class="card">Tổng người dùng: 
            <strong><?= isset($totalUsers) ? $totalUsers : 0 ?></strong>
        </div>
        <div class="card">Tổng khóa học: 
            <strong><?= isset($totalCourses) ? $totalCourses : 0 ?></strong>
        </div>
        <div class="card">Học viên đang học: 
            <strong><?= isset($activeEnrollments) ? $activeEnrollments : 0 ?></strong>
        </div>
    </div>

    <h3>📘 Thống kê khóa học theo danh mục</h3>

    <?php if(!empty($courseByCategory)): ?>
        <table border="1" cellpadding="10">
            <tr>
                <th>Danh mục</th>
                <th>Số khóa học</th>
            </tr>
            <?php foreach ($courseByCategory as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['category_name']) ?></td>
                <td><?= htmlspecialchars($row['total_courses']) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Chưa có dữ liệu khóa học theo danh mục.</p>
    <?php endif; ?>

</div>
