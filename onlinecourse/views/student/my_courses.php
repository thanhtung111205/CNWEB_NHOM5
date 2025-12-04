<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>views/student/my_courses.php</title>
</head>
<body>
    <h2>Khóa học của bạn</h2>
    <?php foreach($myCourses as $mc): ?>
    <div>
        <a href="/course/<?= $mc['id'] ?>"> <?= $mc['title'] ?> </a>
    </div>
    <?php endforeach; ?>
</body>
</html>