<?php include VIEW_PATH . "/layouts/header.php"; ?>

<style>
    /* Đảm bảo các nút hành động không bị dính liền và có khoảng cách */
    .action-buttons-custom .btn {
        margin-right: 5px; /* Khoảng cách giữa các nút */
        margin-bottom: 5px; /* Khoảng cách nếu xuống dòng */
        padding: 6px 10px;
        font-size: 0.85rem; /* Kích thước chữ nhỏ hơn */
        display: inline-flex;
        align-items: center;
    }
    .action-buttons-custom .btn i {
        margin-right: 5px; /* Khoảng cách giữa icon và chữ */
    }
    /* Đảm bảo bảng căn giữa nội dung */
    .table.align-middle > :not(caption) > * > * {
        vertical-align: middle;
    }
</style>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Khóa Học Của Tôi</h2>
        <a href="<?= BASE_URL ?>/course/create" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Tạo khóa học mới
        </a>
    </div>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['success']; unset($_SESSION['success']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (empty($courses)): ?>
        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> Bạn chưa có khóa học nào. Hãy tạo khóa học đầu tiên!
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="5%">ID</th>
                        <th width="10%">Ảnh</th>
                        <th width="25%">Tiêu đề</th>
                        <th width="10%">Cấp độ</th>
                        <th width="10%">Giá (VNĐ)</th>
                        <th width="10%">Thời lượng</th>
                        <th width="15%">Ngày tạo</th>
                        <th width="15%">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($courses as $c): ?>
                        <tr>
                            <td><?= $c['id'] ?></td>
                            <td>
                                <?php if (!empty($c['image'])): ?>
                                    <img src="<?= BASE_URL ?>/assets/uploads/courses/<?= htmlspecialchars($c['image']) ?>" 
                                        alt="Course image" class="img-thumbnail" style="max-width: 80px;">
                                <?php else: ?>
                                    <span class="text-muted">Không có ảnh</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <strong><?= htmlspecialchars($c['title']) ?></strong>
                                <br>
                                <small class="text-muted"><?= mb_substr(htmlspecialchars($c['description']), 0, 60) ?>...</small>
                            </td>
                            <td>
                                <?php
                                    $level_class = 'primary';
                                    switch ($c['level']) {
                                        case 'Beginner':
                                            $level_class = 'success';
                                            break;
                                        case 'Intermediate':
                                            $level_class = 'warning text-dark';
                                            break;
                                        case 'Advanced':
                                            $level_class = 'danger';
                                            break;
                                    }
                                ?>
                                <span class="badge bg-<?= $level_class ?>">
                                    <?= htmlspecialchars($c['level']) ?>
                                </span>
                            </td>
                            <td><?= number_format($c['price'], 0, ',', '.') ?></td>
                            <td><?= $c['duration_weeks'] ?> tuần</td>
                            <td><?= date('d/m/Y H:i', strtotime($c['created_at'])) ?></td>
                            <td>
                                <div class="action-buttons-custom">
                                    <a href="<?= BASE_URL ?>/lesson/manage?course_id=<?= $c['id'] ?>" 
                                        class="btn btn-warning btn-sm text-dark" title="Quản lý bài học">
                                        <i class="bi bi-book"></i> Bài học
                                    </a>
                                    <a href="<?= BASE_URL ?>/course/edit?id=<?= $c['id'] ?>" 
                                        class="btn btn-primary btn-sm" title="Chỉnh sửa">
                                        <i class="bi bi-pencil"></i> Sửa
                                    </a>
                                    <a href="<?= BASE_URL ?>/course/delete?id=<?= $c['id'] ?>" 
                                        class="btn btn-danger btn-sm" 
                                        title="Xóa khóa học"
                                        onclick="return confirm('Bạn có chắc muốn xóa khóa học này? Tất cả bài học và tài liệu liên quan cũng sẽ bị xóa!')">
                                        <i class="bi bi-trash"></i> Xóa
                                    </a>
                                </div>
                                </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <p class="text-muted">
                <i class="bi bi-info-circle"></i> Tổng số: <strong><?= count($courses) ?></strong> khóa học
            </p>
        </div>
    <?php endif; ?>
</div>

<?php include VIEW_PATH . "/layouts/footer.php"; ?>