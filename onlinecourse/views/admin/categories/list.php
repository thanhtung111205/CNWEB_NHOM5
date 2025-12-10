<?php include VIEW_PATH . '/layouts/header.php'; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>

<div class="adminlist-content">

    <h2>Danh sách danh mục</h2>

    <a href="<?= BASE_URL?>/admin/categoryCreate">+ Thêm danh mục</a>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>

        <?php foreach($categories as $c): ?>
            <tr>
                <td><?= $c['id'] ?></td>
                <td><?= htmlspecialchars($c['name']) ?></td>
                <td><?= htmlspecialchars($c['description']) ?></td>
                <td>
                    <a href="<?= BASE_URL ?>/admin/categoryEdit?id=<?= $c['id'] ?>">Sửa</a>
                    |
                    <a href="<?= BASE_URL ?>/admin/categoryDelete?id=<?= $c['id'] ?>" 
                       onclick="return confirm('Xóa danh mục?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>