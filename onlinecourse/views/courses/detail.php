<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>views/courses/detail.php</title>
</head>
<body>
    <h2><?= $course['title'] ?></h2>
    <p><?= $course['description'] ?></p>
    <?php if(!$isEnrolled): ?>
    <form method="post" action="/enroll">
        <input type="hidden" name="course_id" value="<?= $course['id'] ?>">
        <button>Đăng ký</button>
    </form>
    <?php endif; ?>
    <h3>Bài học</h3>
    <ul>
    <?php foreach($lessons as $l): ?>
        <li><?= $l['title'] ?></li>
    <?php endforeach; ?>
    </ul>
</body>
</html>