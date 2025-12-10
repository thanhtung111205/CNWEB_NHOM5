<?php include VIEW_PATH . '/layouts/header.php'; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>

<style>
/* CSS cho Dashboard Tổng Quan Giảng Viên */

.student-main {
    padding: 20px;
}

/* Header và Welcome Text */
.dashboard-header {
    margin-bottom: 30px;
    border-bottom: 1px solid #eee;
    padding-bottom: 15px;
}

.welcome-text {
    font-size: 1.1em;
    color: #6c757d;
}

/* 1. Stats Cards (Thẻ Tổng Quan) - Dùng cho các thẻ tĩnh */
.stats-cards {
    display: flex;
    gap: 20px;
    margin-bottom: 40px;
    flex-wrap: wrap; /* Cho phép xuống dòng nếu cần */
}

.stat-card {
    flex: 1;
    min-width: 250px; /* Đảm bảo thẻ có kích thước tối thiểu */
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    transition: transform 0.2s, box-shadow 0.2s;
    border-left: 5px solid;
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
}

/* Màu sắc border cho các loại thẻ */
.card-blue { border-left-color: #007bff; }
.card-green { border-left-color: #28a745; }
.card-yellow { border-left-color: #ffc107; }
.card-red { border-left-color: #dc3545; }


.card-icon i {
    font-size: 3em;
    opacity: 0.6;
}
.card-blue .card-icon i { color: #007bff; }
.card-green .card-icon i { color: #28a745; }
.card-yellow .card-icon i { color: #ffc107; }
.card-red .card-icon i { color: #dc3545; }

.card-content {
    text-align: right;
}

.card-number {
    display: block;
    font-size: 2.5em;
    font-weight: 700;
    color: #333;
    line-height: 1;
}

.card-label {
    display: block;
    font-size: 0.9em;
    color: #6c757d;
    margin-top: 5px;
}

/* 2. Quick Actions (Hành động nhanh) */
.quick-actions {
    margin-bottom: 40px;
    padding: 20px 0;
    border-bottom: 1px solid #eee;
}

.action-buttons-group {
    margin-top: 15px;
}

.btn-lg {
    padding: 12px 25px;
    font-size: 1.1em;
    border-radius: 6px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    margin-right: 15px;
    transition: background-color 0.2s;
}

.btn-lg i {
    margin-right: 8px;
}

.btn-primary {
    background-color: #007bff;
    color: white;
    border: 1px solid #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
    border: 1px solid #6c757d;
}

.btn-secondary:hover {
    background-color: #5a6268;
    border-color: #5a6268;
}

/* 3. Placeholder Widgets (Các Widget bổ sung) */
.placeholder-widgets {
    display: flex;
    gap: 20px;
    margin-top: 20px;
}

.widget-box {
    flex: 1;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    padding: 20px;
}

.widget-box h3 {
    font-size: 1.2em;
    color: #333;
    border-bottom: 1px solid #eee;
    padding-bottom: 10px;
    margin-bottom: 15px;
}

.widget-list li {
    list-style: none;
    padding: 8px 0;
    color: #555;
    border-bottom: 1px dashed #f1f1f1;
}

.widget-list li:last-child {
    border-bottom: none;
}
</style>
<div class="student-main">
    <div class="dashboard-header">
        <div>
            <h1><i class="fas fa-chalkboard-teacher"></i> Bảng Điều Khiển Giảng Viên</h1>
            <p class="welcome-text">Xin chào, <strong><?= $_SESSION['user']['name'] ?></strong></p>
        </div>
    </div>
    
    <div class="stats-cards">
        
        <div class="stat-card card-blue">
            <div class="card-icon"><i class="fas fa-book-open"></i></div>
            <div class="card-content">
                <span class="card-number">05</span>
                <span class="card-label">Khóa học Đang hoạt động</span>
            </div>
        </div>
        
        <div class="stat-card card-green">
            <div class="card-icon"><i class="fas fa-user-graduate"></i></div>
            <div class="card-content">
                <span class="card-number">450</span>
                <span class="card-label">Tổng số Học viên</span>
            </div>
        </div>

         <div class="stat-card card-yellow">
            <div class="card-icon"><i class="fas fa-chart-line"></i></div>
            <div class="card-content">
                <span class="card-number">85%</span>
                <span class="card-label">Tỷ lệ Hoàn thành TB</span>
            </div>
        </div>
        
    </div>

    <div class="quick-actions">
        <h2><i class="fas fa-bolt"></i> Hành động nhanh</h2>
        <div class="action-buttons-group">
            <a href="<?= BASE_URL ?>/course/create" class="btn btn-primary btn-lg">
                <i class="fas fa-plus-circle"></i> Tạo Khóa học Mới
            </a>

        </div>
    </div>
    
    <div class="placeholder-widgets">
        
        <div class="widget-box">
            <h3><i class="fas fa-comments"></i> Thảo luận Gần đây</h3>
            <ul class="widget-list">
                <li><i class="fas fa-comment-dots"></i> Học viên A: Bài 3 khó quá!</li>
                <li><i class="fas fa-comment-dots"></i> Học viên B: Lịch học tuần tới...</li>
                <li><i class="fas fa-comment-dots"></i> Học viên C: Cảm ơn Giảng viên!</li>
                <a href="#" style="display: block; text-align: right; margin-top: 10px;">Xem tất cả &raquo;</a>
            </ul>
        </div>

        <div class="widget-box">
            <h3><i class="fas fa-bell"></i> Thông báo & Cảnh báo</h3>
            <ul class="widget-list">
                <li><i class="fas fa-exclamation-circle" style="color: #ffc107;"></i> Khóa HTML/CSS cần cập nhật.</li>
                <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Đã duyệt khóa PHP cơ bản.</li>
                <li><i class="fas fa-info-circle" style="color: #007bff;"></i> Đã có tính năng mới!</li>
                <a href="#" style="display: block; text-align: right; margin-top: 10px;">Xem lịch sử &raquo;</a>
            </ul>
        </div>

    </div>
</div>

<?php include VIEW_PATH . '/layouts/footer.php'; ?>