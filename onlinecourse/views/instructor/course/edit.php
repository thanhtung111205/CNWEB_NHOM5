<?php include VIEW_PATH . "/layouts/header.php"; ?>

<h1>Sửa khóa học</h1>

<form action="<?= BASE_URL ?>/course/update" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?php echo $course['id']; ?>">

    <label>Tiêu đề</label>
    <input type="text" name="title" value="<?php echo $course['title']; ?>">

    <label>Mô tả</label>
    <textarea name="description"><?php echo $course['description']; ?></textarea>

    <label>Danh mục</label>
    <input type="number" name="category_id" value="<?php echo $course['category_id']; ?>">

    <label>Giá</label>
    <input type="number" name="price" value="<?php echo $course['price']; ?>">

    <label>Thời lượng</label>
    <input type="number" name="duration_weeks" value="<?php echo $course['duration_weeks']; ?>">

    <label>Cấp độ</label>
    <select name="level">
        <option value="beginner" <?php if($course['level']=='beginner') echo 'selected'; ?>>Beginner</option>
        <option value="intermediate" <?php if($course['level']=='intermediate') echo 'selected'; ?>>Intermediate</option>
        <option value="advanced" <?php if($course['level']=='advanced') echo 'selected'; ?>>Advanced</option>
    </select>

    <label>Ảnh hiện tại:</label>
    <img src="/BaiTH_Nhom5/onlinecourse/assets/uploads/courses/<?php echo $course['image']; ?>" width="150">

    <label>Ảnh mới</label>
    <input type="file" name="image">

    <button type="submit">Lưu thay đổi</button>
</form>

<?php include VIEW_PATH . "/layouts/footer.php"; ?>
