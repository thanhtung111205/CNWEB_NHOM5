<?php include VIEW_PATH . "/layouts/header.php"; ?>

<h2>Tiến độ học viên của khóa học</h2>

<?php if (empty($students)): ?>
    <p>Chưa có học viên đăng ký khóa học này.</p>
<?php else: ?>

<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
    <tr style="background: #f2f2f2;">
        <th>Họ tên</th>
        <th>Email</th>
        <th>Tiến độ</th>
        <th>Trạng thái</th>
    </tr>

    <?php foreach ($students as $s): ?>
        <tr>
            <td><?= htmlspecialchars($s['fullname']) ?></td>
            <td><?= htmlspecialchars($s['email']) ?></td>

            <td style="width:250px;">
                <!-- Thanh tiến độ -->
                <div style="background:#ddd; width:100%; height:18px; border-radius:10px; overflow:hidden;">
                    <div style="width:<?= $s['progress'] ?>%; height:100%; background:#4CAF50;"></div>
                </div>
                <strong><?= $s['progress'] ?>%</strong>
            </td>

            <td><?= $s['status'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php endif; ?>
<style>
    h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #2c3e50;
    font-size: 26px;
    font-weight: 700;
}
</style>
<?php include VIEW_PATH . "/layouts/footer.php"; ?>
