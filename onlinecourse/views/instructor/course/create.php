<?php include VIEW_PATH . "/layouts/header.php"; ?>

<h1>Thêm khóa học</h1>

<form action="<?= BASE_URL ?>/course/store" method="POST" enctype="multipart/form-data">

    <label>Tiêu đề</label>
    <input type="text" name="title">

    <label>Mô tả</label>
    <textarea name="description"></textarea>

    <label>Danh mục</label>
    <input type="number" name="category_id">

    <label>Giá</label>
    <input type="number" name="price">

    <label>Thời lượng (tuần)</label>
    <input type="number" name="duration_weeks">

    <label>Cấp độ</label>
    <select name="level">
        <option value="beginner">Beginner</option>
        <option value="intermediate">Intermediate</option>
        <option value="advanced">Advanced</option>
    </select>

    <label>Ảnh khóa học</label>
    <input type="file" name="image">

    <button type="submit">Tạo khóa học</button>
</form>

<?php include VIEW_PATH . "/layouts/footer.php"; ?>
