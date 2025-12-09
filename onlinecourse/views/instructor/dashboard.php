<?php include VIEW_PATH . '/layouts/header.php'; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>

<div class="main-content">
    <div class="container">
        <div class="dashboard-header">
            <div>
                <h1><i class="fas fa-chalkboard-teacher"></i> Trang giảng viên</h1>
                <p class="welcome-text">Xin chào, <strong><?= $_SESSION['user']['name'] ?></strong></p>
            </div>
        </div>
        
        <div class="instructor-menu">
            <a href="<?= BASE_URL ?>/course/my_courses" class="btn btn-primary">
                <i class="fas fa-book"></i> Khóa học của tôi
            </a>
            <a href="<?= BASE_URL ?>/course/create" class="btn btn-success">
                <i class="fas fa-plus-circle"></i> Tạo khóa học mới
            </a>
        </div>
        
        <h2><i class="fas fa-list"></i> Khóa học của bạn</h2>
        
        <?php if (!empty($courses)): ?>
            <div class="table-wrapper">
                <table class="course-table">
                    ...
                </table>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <i class="fas fa-book-open"></i>
                <h3>Chưa có khóa học nào</h3>
                <p>Bạn chưa tạo khóa học nào. Hãy bắt đầu tạo khóa học đầu tiên của bạn!</p>
                <a href="<?= BASE_URL ?>/course/create" class="btn btn-success">
                    <i class="fas fa-plus-circle"></i> Tạo khóa học đầu tiên
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include VIEW_PATH . '/layouts/footer.php'; ?>
