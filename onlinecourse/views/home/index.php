<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>views/home/index.php</title>
</head>
<body>
    <!-- // --- views/home/index.php --- -->
    <h2>Danh sách khóa học</h2>
    <form method="get">
        <input type="text" name="q" placeholder="Tìm kiếm..." value="<?= $filters['q'] ?? '' ?>">
        <select name="category">
            <option value="">--Danh mục--</option>
            <?php foreach($categories as $cat): ?>
                <option value="<?= $cat['id'] ?>" <?= (isset($filters['category_id']) && $filters['category_id']==$cat['id'])?'selected':'' ?>>
                    <?= $cat['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button>Tìm</button>
    </form>
    <div class="courses">
    <?php foreach($courses as $c): ?>
        <div class="course-item">
            <a href="/course/<?= $c['id'] ?>"> <?= $c['title'] ?> </a>
        </div>
    <?php endforeach; ?>
    </div>
</body>
</html>
