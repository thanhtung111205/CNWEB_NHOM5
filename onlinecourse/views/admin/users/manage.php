<?php include VIEW_PATH . "/layouts/header.php"; ?>

<div class="container">
    <h2>Quản lý người dùng</h2>

    <table border="1" cellpadding="10" width="100%">
        <tr>
            <th>ID</th>
            <th>Tên đăng nhập</th>
            <th>Email</th>
            <th>Vai trò</th>
            <th>Ngày tạo</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>

        <?php foreach ($users as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= $u['username'] ?></td>
                <td><?= $u['email'] ?></td>

                <td>
                    <?php
                        if ($u['role'] == 2) echo "Quản trị viên";
                        elseif ($u['role'] == 1) echo "Giảng viên";
                        elseif ($u['role'] == 0) echo "Học viên";
                        elseif ($u['role'] == -1) echo "<span style='color:red;'>Bị khóa</span>";
                    ?>
                </td>

                <td><?= $u['created_at'] ?></td>

                <td>
                    <?php if ($u['role'] == -1): ?>
                        <span style="color:red;">Đang bị khóa</span>
                    <?php else: ?>
                        <span style="color:green;">Hoạt động</span>
                    <?php endif; ?>
                </td>

                <td>
                    <?php if ($u['role'] == -1): ?>
                        <!-- Nếu đang khóa -> hiện nút mở khóa -->
                        <form action="<?= BASE_URL ?>/admin/updateUser" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $u['id'] ?>">
                            <button type="submit" name="action" value="unlock">Mở khóa</button>
                        </form>
                    <?php else: ?>
                        <!-- Nếu đang hoạt động -> hiện nút khóa -->
                        <form action="<?= BASE_URL ?>/admin/updateUser" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $u['id'] ?>">
                            <button type="submit" name="action" value="lock">Khóa</button>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include VIEW_PATH . "/layouts/footer.php"; ?>
