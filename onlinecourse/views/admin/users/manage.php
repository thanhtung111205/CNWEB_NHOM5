<?php include VIEW_PATH . "/layouts/header.php"; ?>
<div class="layout">
    <!-- Sidebar -->
    <?php include VIEW_PATH . "/layouts/sidebar.php"; ?>

    <!-- Nội dung chính -->
    <div class="content">
        <h2>Quản lý người dùng</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên đăng nhập</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $u): ?>
                    <tr>
                        <td><?= $u['id'] ?></td>
                        <td><?= htmlspecialchars($u['username']) ?></td>
                        <td><?= htmlspecialchars($u['email']) ?></td>
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
                                <form action="<?= BASE_URL ?>/admin/updateUser" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $u['id'] ?>">
                                    <button type="submit" name="action" value="unlock">Mở khóa</button>
                                </form>
                            <?php else: ?>
                                <form action="<?= BASE_URL ?>/admin/updateUser" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $u['id'] ?>">
                                    <button type="submit" name="action" value="lock">Khóa</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<style>
    /* Layout flex để sidebar + content nằm cùng hàng */
.layout {
    display: flex;
    align-items: flex-start;
}

/* Nội dung chính nằm bên phải sidebar */
.content {
    flex: 1;
    margin-left: 250px; /* bằng với chiều rộng sidebar */
    padding: 20px;
    background-color: #f9f9f9;
    box-sizing: border-box;
}

/* Bảng */
.content table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
}

.content table th,
.content table td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
}

.content table th {
    background-color: #e5e7eb;
}

/* Nút khóa/mở khóa */
.content button {
    padding: 5px 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.content button[name="action"][value="lock"] {
    background-color: #f87171;
    color: #fff;
}

.content button[name="action"][value="unlock"] {
    background-color: #34d399;
    color: #fff;
}

.content button:hover {
    opacity: 0.9;
}

/* Responsive nhỏ */
@media (max-width: 768px) {
    .sidebar {
        position: relative;
        width: 100%;
        height: auto;
        top: 0;
    }
    .content {
        margin-left: 0;
    }
}

</style>
<?php include VIEW_PATH . "/layouts/footer.php"; ?>
