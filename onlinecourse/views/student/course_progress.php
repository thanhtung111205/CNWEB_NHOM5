<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>views/student/course_progress.php</title>
</head>

<body>
    <h2>Tiến độ: <?= $course['title'] ?></h2>


    <!-- # views/courses/index.php -->
    ```php
    <h2>Tất cả khóa học</h2>
    <form method="GET">
        <input type="text" name="keyword" placeholder="Tìm kiếm khóa học">
        <button type="submit">Tìm</button>
    </form>


    <div class="course-list">
        <?php foreach ($courses as $course): ?>
            <div class="course-item">
                <h3><?= $course['title'] ?></h3>
                <a href="index.php?controller=course&action=detail&id=<?= $course['id'] ?>">Xem chi tiết</a>
            </div>
        <?php endforeach; ?>
    </div>
    ```


    <!-- # views/courses/detail.php -->
    ```php
    <h2><?= $course['title'] ?></h2>
    <p><?= $course['description'] ?></p>
    <a href="index.php?controller=enrollment&action=register&courseId=<?= $course['id'] ?>&userId=<?= $_SESSION['user_id'] ?>">Đăng ký khóa học</a>
    ```


    <!-- # views/courses/search.php -->
     <!-- Dấu php ... mà bạn thấy chính là ký hiệu Markdown để hiển thị code có tô màu (syntax highlight).
    Cách Markdown đánh dấu đoạn code.-->
    ```php
    <h2>Kết quả tìm kiếm</h2>
    <?php if (empty($courses)): ?>
        <p>Không tìm thấy khóa học.</p>
    <?php else: ?>
        <?php foreach ($courses as $course): ?>
            <div><?= $course['title'] ?></div>
        <?php endforeach; ?>
    <?php endif; ?>
    ```


    <!-- # views/student/dashboard.php -->
    ```php
    <h2>Trang cá nhân</h2>
    <p>Xin chào, <?= $_SESSION['username'] ?></p>
    <a href="index.php?controller=student&action=myCourses">Khóa học của tôi</a>
    ```


    <!-- # views/student/my_courses.php -->
    ```php
    <h2>Khóa học đã đăng ký</h2>
    <?php foreach ($myCourses as $course): ?>
        <div>
            <h3><?= $course['title'] ?></h3>
            <a href="index.php?controller=enrollment&action=progress&courseId=<?= $course['id'] ?>&userId=<?= $_SESSION['user_id'] ?>">Xem tiến độ</a>
        </div>
    <?php endforeach; ?>
    ```


    <!-- # views/student/course_progress.php -->
    ```php
    <h2>Tiến độ học tập</h2>
    <p>Tiến độ hiện tại: <?= $progress ?>%</p> nguyên phần code này nằm trong file views/student/course_progress.php à
</body>

</html>