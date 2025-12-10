<?php include VIEW_PATH . "/layouts/header.php"; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>

<div class="content">
<h2>Tiến độ học viên của khóa học</h2>
<?php if (empty($students)): ?>
    <p class="no-students">Chưa có học viên đăng ký khóa học này.</p>
<?php else: ?>

<table class="progress-table">
    <tr>
        <th>Họ tên</th>
        <th>Email</th>
        <th>Tiến độ</th>
        <th>Trạng thái</th>
    </tr>

    <?php foreach ($students as $s): ?>
    <tr>
        <td><?= htmlspecialchars($s['fullname']) ?></td>
        <td><?= htmlspecialchars($s['email']) ?></td>

        <td>
            <div class="progress-bar">
                <div class="progress-fill" style="width:<?= $s['progress'] ?>%;"></div>
            </div>
            <strong><?= $s['progress'] ?>%</strong>
        </td>

        <td><?= $s['status'] ?></td>
    </tr>
    <?php endforeach; ?>

</table>

<?php endif; ?>
</div>
<style>

/* Bọc content cho đẹp */
.content {
    margin-left: 250px;       
    padding: 90px 30px 30px;
}
/* Tiêu đề gần bảng hơn */
h2 {
    margin-bottom: 20px;
    text-align: center;
    font-size: 24px;
    font-weight: 600;
    color: #333;
}
/* Bảng tiến độ */
.progress-table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

/* Header của bảng */
.progress-table th {
    background: #6a5de8;
    color: white;
    padding: 14px;
    text-align: left;
    font-size: 15px;
}

/* Dòng bảng */
.progress-table td {
    padding: 12px;
    border-bottom: 1px solid #eee;
    font-size: 14px;
    color: #333;
}

/* Hover từng dòng */
.progress-table tr:hover td {
    background: #f8f7ff;
}

/* Progress bar */
.progress-bar {
    background: #e6e6e6;
    width: 100%;
    height: 18px;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 5px;
}

.progress-fill {
    height: 100%;
    background: #4CAF50;
    border-radius: 10px;
}

/* Dòng cuối không có border */
.progress-table tr:last-child td {
    border-bottom: none;
}
/*css cho trường hợp ko có học viên nào đki khóa học*/ 
.no-students {
    padding: 12px 18px;
    font-size: 16px;
    color: #1029b8ff;
    background: #1bd0caff;
    border: 1px solid #ddd;
    border-radius: 8px;
    margin: 10px 0;
    font-weight: bolder;
    text-align: center;
}
</style>
<?php include VIEW_PATH . "/layouts/footer.php"; ?>
