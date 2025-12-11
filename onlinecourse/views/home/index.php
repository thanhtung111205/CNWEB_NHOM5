<?php include VIEW_PATH . '/layouts/header.php'; ?>

<style>
/* ===================== HERO ====================== */
.hero {
    background: linear-gradient(135deg, #6a36ff, #8b5cff);
    padding: 80px 20px;
    color: white;
    text-align: center;
    transition: background 0.4s ease;
}

.hero h1 {
    font-size: 38px;
    font-weight: bold;
    margin-bottom: 15px;
}

.hero p {
    font-size: 16px;
    opacity: 0.95;
    margin-bottom: 25px;
}

.hero .btn-main {
    display: inline-block;
    background: white;
    color: #6a36ff;
    padding: 12px 25px;
    border-radius: 10px;
    font-weight: bold;
    transition: background 0.3s ease, transform 0.3s ease;
}

.hero .btn-main:hover {
    background: #f1ecff;
    transform: translateY(-3px);
}

/* ===================== STATS ====================== */
.stats {
    display: flex;
    justify-content: center;
    gap: 60px;
    padding: 40px 20px;
    text-align: center;
}

.stat-box {
    padding: 10px 20px;
    border-radius: 14px;
    transition: 
        transform 0.35s ease,
        box-shadow 0.35s ease,
        background 0.35s ease;
}

.stat-box h2 {
    color: #6a36ff;
    font-size: 30px;
    margin-bottom: 5px;
    transition: transform 0.35s ease;
}

.stat-box p {
    font-size: 15px;
    color: #555;
    transition: transform 0.35s ease;
}

.stat-box:hover {
    transform: translateY(-6px);
    background: #f3eeff;
    box-shadow: 0px 12px 28px rgba(106,54,255,0.18);
}

.stat-box:hover h2,
.stat-box:hover p {
    transform: scale(1.10);
}


/* ===================== COURSE LIST ====================== */
.container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 40px 20px;
}

.section-title {
    text-align: center;
    margin-bottom: 40px;
}

.section-title h1 {
    font-size: 32px;
    font-weight: bold;
    color: #333;
}

.course-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(330px,1fr));
    gap: 35px;
}

/* CARD */
.course-item {
    background: #fff;
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0px 8px 25px rgba(0,0,0,0.08);
    transition: 
        transform 0.35s ease, 
        box-shadow 0.35s ease,
        border-radius 0.3s ease;
}

.course-item:hover {
    transform: translateY(-8px);
    box-shadow: 0px 14px 35px rgba(0,0,0,0.12);
    border-radius: 25px;
}

.course-item img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.35s ease;
}

.course-item:hover img {
    transform: scale(1.08);
}

.course-content {
    padding: 20px;
}

.course-content h3 {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 8px;
}

.course-content p {
    font-size: 14px;
    color: #666;
    height: 42px;
    overflow: hidden;
    text-overflow: ellipsis;
    margin-bottom: 15px;
}

.course-content a {
    display: inline-block;
    background: #6a36ff;
    color: white;
    padding: 10px 16px;
    border-radius: 10px;
    font-weight: bold;
    transition: 
        background 0.3s ease,
        transform 0.3s ease,
        box-shadow 0.3s ease;
}

.course-content a:hover {
    background: #5226db;
    transform: translateY(-4px);
    box-shadow: 0px 8px 18px rgba(0,0,0,0.15);
}


/* ===================== WHY CHOOSE US ====================== */
.why {
    background: #f6f7fb;
    padding: 50px 20px;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0px 8px 20px rgba(0,0,0,0.05);
}

.why-title {
    text-align: center;
    margin-bottom: 40px;
}

.why-title h2 {
    font-size: 30px;
    font-weight: bold;
}

.why-boxes {
    max-width: 1100px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px,1fr));
    gap: 25px;
}

.why-box {
    background: #fff;
    padding: 25px;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0px 8px 20px rgba(0,0,0,0.05);
    transition: 
        transform 0.35s ease, 
        box-shadow 0.35s ease,
        background 0.35s ease;
}

.why-box:hover {
    transform: translateY(-8px);
    background: #ffffff;
    box-shadow: 0px 16px 40px rgba(0,0,0,0.12);
}

.why-box img {
    width: 60px;
    transition: transform 0.35s ease;
}

.why-box:hover img {
    transform: scale(1.20);
}

.why-box h3 {
    font-size: 18px;
    margin-bottom: 8px;
}

.why-box p {
    font-size: 14px;
    color: #666;
}

</style>

<!-- ===================== HERO ====================== -->
<div class="hero">
    <h1>Học Tập Mọi Lúc, Mọi Nơi</h1>
    <p>Khám phá hàng ngàn khóa học chất lượng cao từ giảng viên hàng đầu.</p>
    <a href="#" class="btn-main">Khám Phá Khóa Học</a>
</div>

<!-- ===================== STATS ====================== -->
<div class="stats">
    <div class="stat-box">
        <h2>6+</h2>
        <p>Khóa Học</p>
    </div>
    <div class="stat-box">
        <h2>1000+</h2>
        <p>Học Viên</p>
    </div>
    <div class="stat-box">
        <h2>50+</h2>
        <p>Giảng Viên</p>
    </div>
    <div class="stat-box">
        <h2>100%</h2>
        <p>Chứng Chỉ</p>
    </div>
</div>

<!-- ===================== COURSE LIST ====================== -->
<div class="container">
    <div class="section-title">
        <h1>Danh Sách Khóa Học Mới Nhất</h1>
    </div>

    <?php if (!empty($courses)): ?>
        <div class="course-list">
            <?php foreach ($courses as $c): ?>
                <div class="course-item">

                    <?php if (!empty($c['image'])): ?>
                        <img src="<?= BASE_URL ?>/assets/uploads/courses/<?php echo $c['image']; ?>">
                    <?php else: ?>
                        <img src="<?= BASE_URL ?>/assets/images/default-course.jpg">
                    <?php endif; ?>

                    <div class="course-content">
                        <h3><?php echo htmlspecialchars($c['title']); ?></h3>
                        <p><?php echo htmlspecialchars($c['description']); ?></p>
                        <a href="<?= BASE_URL ?>/course/detail/<?php echo $c['id']; ?>">Xem Chi Tiết</a>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p style="text-align:center;">Chưa có khóa học nào.</p>
    <?php endif; ?>
</div>

<!-- ===================== WHY CHOOSE US ====================== -->
<div class="why">
    <div class="why-title">
        <h2>Tại Sao Chọn Chúng Tôi?</h2>
    </div>

    <div class="why-boxes">
        <div class="why-box">
            <img src="https://cdn-icons-png.flaticon.com/512/1048/1048949.png">
            <h3>Học Online Linh Hoạt</h3>
            <p>Học mọi lúc, mọi nơi trên tất cả thiết bị.</p>
        </div>

        <div class="why-box">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">
            <h3>Giảng Viên Chất Lượng</h3>
            <p>Đội ngũ giảng viên giàu kinh nghiệm.</p>
        </div>

        <div class="why-box">
            <img src="https://cdn-icons-png.flaticon.com/512/3565/3565418.png">
            <h3>Chứng Chỉ Hoàn Thành</h3>
            <p>Nhận chứng chỉ sau khi hoàn tất khóa học.</p>
        </div>

        <div class="why-box">
            <img src="https://cdn-icons-png.flaticon.com/512/1053/1053210.png">
            <h3>Hỗ Trợ 24/7</h3>
            <p>Đội ngũ hỗ trợ luôn sẵn sàng giải đáp.</p>
        </div>
    </div>
</div>

<?php include VIEW_PATH . '/layouts/footer.php'; ?>
