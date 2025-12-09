<?php include VIEW_PATH . '/layouts/header.php'; ?>

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
                <thead>
                    <tr>
                        <th>Tiêu đề</th>
                        <th>Danh mục</th>
                        <th>Giá</th>
                        <th>Cấp độ</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($courses as $course): ?>
                        <tr>
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
                                    switch(strtolower($course['level'])) {
                                        case 'beginner':
                                            $levelClass = 'level-beginner';
                                            $levelIcon = 'fa-star';
                                            break;
                                        case 'intermediate':
                                            $levelClass = 'level-intermediate';
                                            $levelIcon = 'fa-star-half-alt';
                                            break;
                                        case 'advanced':
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
                                       onclick="return confirm('Xác nhận xóa?')">
                                        <i class="fas fa-trash"></i>
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

<?php include VIEW_PATH . '/layouts/footer.php'; ?>