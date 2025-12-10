<?php include VIEW_PATH . '/layouts/header.php'; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">

<!-- Bọc nội dung -->
<div class="admin-content">

    <h2>📊 Thống kê hệ thống</h2>

    <div class="stats">
        <div class="card">Tổng người dùng: <strong><?= $totalUsers['total'] ?></strong></div>
        <div class="card">Tổng khóa học: <strong><?= $totalCourses['total'] ?></strong></div>
        <div class="card">Học viên đang học: <strong><?= $activeEnrollments['total'] ?></strong></div>
    </div>

    <h3>📘 Thống kê khóa học theo danh mục</h3>
    <table border="1" cellpadding="10">
        <tr>
            <th>Danh mục</th>
            <th>Số khóa học</th>
        </tr>
        <?php foreach ($courseByCategory as $row): ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['total'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

</div>
