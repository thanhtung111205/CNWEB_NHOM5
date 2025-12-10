<?php include VIEW_PATH . '/layouts/header.php'; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>

<div class="content">
    <h2>Thêm danh mục mới</h2>

    <?php if(!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form action="<?= BASE_URL ?>/admin/categoryCreate" method="POST">
        <label for="name">Tên danh mục:</label>
        <input type="text" name="name" id="name" required>

        <label for="description">Mô tả:</label>
        <textarea name="description" id="description"></textarea>

        <button type="submit" class="btn btn-success">Thêm danh mục</button>
    </form>
</div>
<style>
    /* Content nằm cạnh sidebar */
.content {
    margin-left: 250px; /* bằng width sidebar */
    padding: 30px;
    flex: 1;
    background: #f9f9f9;
    min-height: calc(100vh - 70px);
    box-sizing: border-box;
    border-radius: 10px;
}

/* Tiêu đề */
.content h2 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

/* Form */
.content form {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.05);
    max-width: 600px;
}

/* Label */
.content label {
    display: block;
    margin-bottom: 5px;
    font-weight: 600;
    color: #555;
}

/* Input & textarea */
.content input[type="text"],
.content textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
    transition: 0.2s;
}

.content input[type="text"]:focus,
.content textarea:focus {
    border-color: #6a5de8;
    outline: none;
}

/* Button */
.content button.btn-success {
    background: #6a5de8;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.2s;
}

.content button.btn-success:hover {
    background: #5b4de7;
}

/* Thông báo lỗi */
.content p {
    margin-bottom: 15px;
    font-size: 14px;
}
</style>
<?php include VIEW_PATH . '/layouts/footer.php'; ?>
