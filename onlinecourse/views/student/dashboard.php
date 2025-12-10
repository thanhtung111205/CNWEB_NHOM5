<?php include VIEW_PATH . '/layouts/header.php'; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>

<div class="content-area">   <!-- nội dung nằm tại đây -->

    <div class="student-content">
        <div class="student-box">
            <h2>🎓 Trang học viên</h2>
            <p class="sub-text">Chọn các chức năng bên trái để bắt đầu</p>
        </div>

        <!-- Dashboard Stats -->
        <div class="dashboard-stats">

            <div class="stat-card" onclick="location.reload();">
                <i class="fas fa-book"></i>
                <h3>5</h3>
                <p>Khóa Học Đã Đăng</p>
            </div>

            <div class="stat-card" onclick="location.reload();">
                <i class="fas fa-user-graduate"></i>
                <h3>20</h3>
                <p>Bài Học Đã Hoàn Thành</p>
            </div>

            <div class="stat-card" onclick="location.reload();">
                <i class="fas fa-clock"></i>
                <h3>12h</h3>
                <p>Thời Gian Đã Học</p>
            </div>

        </div>
        <!-- Recent Notifications -->
        <div class="info-section">
            <h3><i class="fas fa-bell"></i> Thông báo mới</h3>

            <ul class="info-list">
                <li onclick="location.reload();">
                    <span class="dot yellow"></span>
                    Khóa HTML/CSS cần cập nhật tài liệu mới.
                </li>

                <li onclick="location.reload();">
                    <span class="dot green"></span>
                    Học viên B vừa hoàn thành khóa PHP.
                </li>

                <li onclick="location.reload();">
                    <span class="dot blue"></span>
                    Đã thêm tính năng quiz mới trong hệ thống.
                </li>
            </ul>
        </div>
        <!-- Recent Activities -->
        <div class="info-section">
            <h3><i class="fas fa-history"></i> Hoạt động gần đây</h3>

            <ul class="info-list">
                <li onclick="location.reload();">
                    <span class="dot purple"></span>
                    Bạn đã đăng nhập cách đây 2 giờ.
                </li>

                <li onclick="location.reload();">
                    <span class="dot green"></span>
                    Cập nhật ảnh đại diện thành công.
                </li>

                <li onclick="location.reload();">
                    <span class="dot red"></span>
                    Có 1 học viên hỏi về bài học số 3.
                </li>
            </ul>
        </div>

    </div>

</div>


<style>
/*--- KHÔNG BỊ ĐÈ BỞI SIDEBAR --*/
.content-area {
    margin-left: 20px;  /* bằng đúng width sidebar */
    padding: 20px;
}

.student-content {
    max-width: 1100px;
    margin: 0 auto;
}
.student-content {
    margin-left: 240px; /* đúng bằng chiều rộng sidebar */
    padding: 20px;
}
.dashboard-stats {
    display: flex;
    gap: 20px;
    margin-top: 25px;
}

.stat-card {
    flex: 1;
    padding: 20px;
    background: linear-gradient(135deg, #6a5de8, #8a7ff0);
    color: white;
    border-radius: 12px;
    text-align: center;
    cursor: pointer;
    transition: 0.2s ease;
}

.stat-card:hover {
    transform: translateY(-4px);
    opacity: 0.95;
}

.stat-card i {
    font-size: 32px;
    margin-bottom: 10px;
}

.stat-card h3 {
    font-size: 28px;
    margin: 5px 0;
}

.stat-card p {
    font-size: 15px;
    opacity: 0.9;
}
.info-section {
    background: white;
    padding: 20px 25px;
    border-radius: 12px;
    margin-top: 25px;
    box-shadow: 0px 2px 8px rgba(0,0,0,0.07);
}

.info-section h3 {
    font-size: 18px;
    margin-bottom: 15px;
    color: #444;
    display: flex;
    align-items: center;
    gap: 8px;
}

.info-list {
    list-style: none;
    padding-left: 0;
}

.info-list li {
    padding: 12px 0;
    border-bottom: 1px solid #eee;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 10px;
}

.info-list li:last-child {
    border-bottom: none;
}

.info-list li:hover {
    background: #f9f7ff;
    border-radius: 6px;
    padding-left: 8px;
    transition: 0.2s;
}

/* Dấu chấm màu */
.dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    display: inline-block;
}

.dot.green { background: #32c671; }
.dot.yellow { background: #f5c542; }
.dot.blue { background: #4da3ff; }
.dot.purple { background: #a26bff; }
.dot.red { background: #ff5252; }



</style>
<?php include VIEW_PATH . '/layouts/footer.php'; ?>
