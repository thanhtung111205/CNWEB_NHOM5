<?php include VIEW_PATH . '/layouts/header.php'; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>

<div class="adminlist-content">

    <h2>Danh sách danh mục</h2>

    <a class="btn btn-add" href="<?= BASE_URL?>/admin/categoryCreate">+ Thêm danh mục</a>

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
                    <a class="btn btn-edit" href="<?= BASE_URL ?>/admin/categoryEdit?id=<?= $c['id'] ?>">Sửa</a>
                    |
                    <a class="btn btn-delete" href="<?= BASE_URL ?>/admin/categoryDelete?id=<?= $c['id'] ?>" 
                       onclick="return confirm('Xóa danh mục?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<style>
    /* ===== BUTTON STYLE ===== */
.btn {
    padding: 6px 12px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 500;
    color: white;
    margin-right: 6px;
    display: inline-block;

    /* Hiệu ứng transition */
    transition: 0.25s ease-in-out;
}

/* Nút thêm */
.btn-add {
    background: #4234dbff;
}
.btn-add:hover {
    background: #294bb9ff;
    transform: scale(1.05);
}

/* Nút sửa */
.btn-edit {
    background: #f1c40f;
    color: #000;
}
.btn-edit:hover {
    background: #d4ac0d;
    transform: scale(1.05);
}

/* Nút xóa */
.btn-delete {
    background: #e74c3c;
}
.btn-delete:hover {
    background: #c0392b;
    transform: scale(1.05);
}

</style>
</div>