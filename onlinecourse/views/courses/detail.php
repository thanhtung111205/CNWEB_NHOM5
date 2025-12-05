<?php include VIEW_PATH . "/layouts/header.php"; ?>

<h1><?php echo $course['title']; ?></h1>

<img src="/BaiTH_Nhom5/onlinecourse/assets/uploads/courses/<?php echo $course['image']; ?>" width="300">

<p><?php echo $course['description']; ?></p>
<p><strong>Giá:</strong> <?php echo $course['price']; ?> VND</p>
<p><strong>Thời lượng:</strong> <?php echo $course['duration_weeks']; ?> tuần</p>

<?php include VIEW_PATH . "/layouts/footer.php"; ?>
