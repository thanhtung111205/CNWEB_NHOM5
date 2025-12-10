<?php include VIEW_PATH . '/layouts/header.php'; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>

<div class="content">
    <h2>Sửa danh mục</h2>

    <form action="<?= BASE_URL ?>/admin/categoryEdit?id=<?= $category['id'] ?>" method="POST">
        <label>Tên danh mục</label>
        <input type="text" name="name" value="<?= htmlspecialchars($category['name']) ?>" required>

        <label>Mô tả</label>
        <textarea name="description"><?= htmlspecialchars($category['description']) ?></textarea>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>

<style>
    /* Nội dung bên phải sidebar */
.content {
    margin-left: 270px;  /* khoảng cách từ trái, bằng width sidebar + margin */
    padding: 20px;
}

/* Form chỉnh sửa danh mục */
.content form {
    max-width: 600px;
    background: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.content form label {
    display: block;
    margin-top: 15px;
    font-weight: 600;
}

.content form input[type="text"],
.content form textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.content form button {
    margin-top: 20px;
    padding: 10px 20px;
    background: #6a5de8;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.content form button:hover {
    background: #5b4de7;
}
</style>
<?php include VIEW_PATH . '/layouts/footer.php'; ?>
