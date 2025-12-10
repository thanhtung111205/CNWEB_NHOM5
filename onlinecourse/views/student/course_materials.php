<?php include VIEW_PATH . "/layouts/header.php"; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>
<div class="content">

<h2 class="lesson-title">Bài học & Tài liệu của khóa học</h2>

<?php if (empty($lessons)): ?>
    <p class="no-lesson-text">Chưa có bài học nào.</p>

<?php else: ?>
<div class="lesson-wrapper">
    <?php foreach ($lessons as $lesson): ?>

        <div class="lesson-box">
            <h3 class="lesson-name">📘 <?= htmlspecialchars($lesson['title']) ?></h3>

            <hr class="lesson-divider">

            <div>
                <strong class="material-label">Tài liệu:</strong>

                <?php if (!empty($lesson['materials'])): ?>
                    <ul class="material-list">
                        <?php foreach ($lesson['materials'] as $m): ?>
                            <li class="material-item">
                                <span>📄 <?= htmlspecialchars($m['filename']) ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                <?php else: ?>
                    <p class="no-material-text">Không có tài liệu cho bài học này.</p>
                <?php endif; ?>
            </div>

        </div>

    <?php endforeach; ?>
</div>
<?php endif; ?>

<a href="<?= BASE_URL ?>/enrollment/progressList">
    <div class="btn-wrap">
        <button class="btn-back">Quay lại</button>
    </div>
</a>

</div> <!-- end .content -->
<style>
    /* Nội dung hiển thị bên phải sidebar */
    /* ===== NỘI DUNG CHUNG (đã có sidebar) ===== */
.content {
    margin-left: 250px;
    margin-top: 70px;
    padding: 20px;
    max-width: calc(100% - 250px);
}

/* ===== TIÊU ĐỀ TRANG ===== */
.lesson-title {
    text-align: center;
    margin-bottom: 25px;
    font-size: 24px;
    color: #333;
}

.no-lesson-text {
    text-align: center;
    color: #777;
    font-size: 16px;
}

/* ===== KHUNG DANH SÁCH BÀI HỌC ===== */
.lesson-wrapper {
    max-width: 800px;
    margin: 0 auto;
}

.lesson-box {
    border: 1px solid #ddd;
    border-radius: 10px;
    margin-bottom: 20px;
    padding: 18px;
    background: #fafafa;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
}

.lesson-name {
    color: #333;
    margin-bottom: 10px;
}

.lesson-divider {
    border: 0;
    height: 1px;
    background: #ddd;
    margin: 12px 0;
}

/* ===== TÀI LIỆU ===== */
.material-label {
    color: #4CAF50;
}

.material-list {
    list-style: none;
    padding-left: 0;
    margin-top: 10px;
}

.material-item {
    margin-bottom: 8px;
    padding: 8px 12px;
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.no-material-text {
    color: #888;
    margin-top: 10px;
    font-style: italic;
}

/* ===== BUTTON QUAY LẠI ===== */
.btn-back {
    background: #6a5de8;
    color: #fff;
    padding: 10px 18px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    float: right;
    margin-right: 70px;
}

.btn-back:hover {
    background: #5848d6;
}

</style>
<?php include VIEW_PATH . "/layouts/footer.php"; ?>
