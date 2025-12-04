<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>--- views/courses/index.php ---</title>
</head>
<body>
    <h2>Tất cả khóa học</h2>
    <?php foreach($courses as $c): ?>
        <div><a href="/course/<?= $c['id'] ?>"> <?= $c['title'] ?> </a></div>
    <?php endforeach; ?>

</body>
</html>