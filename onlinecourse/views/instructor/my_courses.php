<?php include VIEW_PATH . '/layouts/header.php'; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>

<div class="student-main">
    <div class="page-header">
        <h1><i class="fas fa-book-open"></i> Khóa học của tôi</h1>
        <a href="<?= BASE_URL ?>/course/create" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> Tạo khóa học mới
        </a>
    </div>
    
    <?php if (!empty($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> <?= $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>
    
    <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i> <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>
    
    <?php if (!empty($courses)): ?>
        <div class="courses-stats">
            <div class="stat-card">
                <i class="fas fa-graduation-cap"></i>
                <div>
                    <h3><?= count($courses) ?></h3>
                    <p>Tổng khóa học</p>
                </div>
            </div>
        </div>

        <div class="table-wrapper">
            <table class="course-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Danh mục</th>
                        <th>Giá</th>
                        <th>Cấp độ</th>
                        <th>Thời lượng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($courses as $course): ?>
                        <tr>
                            <td><strong>#<?= $course['id'] ?></strong></td>
                            <td>
                                <div class="course-title">
                                    <i class="fas fa-book"></i>
                                    <?= htmlspecialchars($course['title']) ?>
                                </div>
                            </td>
                            <td>
                                <span class="badge badge-category">
                                    <?= $course['category_id'] ?>
                                </span>
                            </td>
                            <td>
                                <span class="price"><?= number_format($course['price'], 0, ',', '.') ?>đ</span>
                            </td>
                            <td>
                                <?php 
                                    $levelClass = '';
                                    $levelIcon = '';
                                    switch($course['level']) {
                                        case 'Beginner':
                                            $levelClass = 'level-beginner';
                                            $levelIcon = 'fa-star';
                                            break;
                                        case 'Intermediate':
                                            $levelClass = 'level-intermediate';
                                            $levelIcon = 'fa-star-half-alt';
                                            break;
                                        case 'Advanced':
                                            $levelClass = 'level-advanced';
                                            $levelIcon = 'fa-trophy';
                                            break;
                                    }
                                ?>
                                <span class="badge <?= $levelClass ?>">
                                    <i class="fas <?= $levelIcon ?>"></i>
                                    <?= $course['level'] ?>
                                </span>
                            </td>
                            <td>
                                <i class="far fa-clock"></i> <?= $course['duration_weeks'] ?> tuần
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="<?= BASE_URL ?>/course/edit?id=<?= $course['id'] ?>" 
                                       class="btn-action btn-edit" 
                                       title="Sửa">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= BASE_URL ?>/lesson/manage?course_id=<?= $course['id'] ?>" 
                                       class="btn-action btn-lessons" 
                                       title="Bài học">
                                        <i class="fas fa-list"></i>
                                    </a>
                                    <a href="<?= BASE_URL ?>/course/delete?id=<?= $course['id'] ?>" 
                                       class="btn-action btn-delete" 
                                       title="Xóa"
                                       onclick="return confirm('Bạn có chắc muốn xóa khóa học này?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="<?= BASE_URL ?>/enrollment/studentsProgress?course_id=<?= $course['id'] ?>"
                                        class="btn-action btn-delete"
                                        title="Tiến độ">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
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
    
</style>
<?php include VIEW_PATH . '/layouts/footer.php'; ?>
