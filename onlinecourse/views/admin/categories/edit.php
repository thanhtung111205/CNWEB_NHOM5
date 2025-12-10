<h2>Sửa danh mục</h2>

<form action="/admin/categoryUpdate" method="POST">
    <input type="hidden" name="id" value="<?= $category['id'] ?>">

    <label>Tên danh mục</label>
    <input type="text" name="name" value="<?= $category['name'] ?>" required>

    <label>Mô tả</label>
    <textarea name="description"><?= $category['description'] ?></textarea>

    <button type="submit">Cập nhật</button>
</form>
