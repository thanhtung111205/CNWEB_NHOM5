<?php include VIEW_PATH . "/layouts/header.php"; ?>

<h2 style="text-align:center; margin-bottom:20px;">Bài học & Tài liệu của khóa học</h2>

<?php if (empty($lessons)): ?>
    <p style="text-align:center; color:#777; font-size:16px;">Chưa có bài học nào.</p>

<?php else: ?>

<div style="max-width: 800px; margin: 0 auto;">
    <?php foreach ($lessons as $lesson): ?>
        
        <div style="
            border:1px solid #ddd;
            border-radius:10px;
            margin-bottom:20px;
            padding:15px;
            background:#fafafa;
            box-shadow:0px 2px 5px rgba(0,0,0,0.05);
        ">
            <!-- Tiêu đề bài học -->
            <h3 style="color:#333; margin-bottom:10px;">
                📘 <?= htmlspecialchars($lesson['title']) ?>
            </h3>

            <!-- Phân tách -->
            <hr style="border:0; height:1px; background:#ddd; margin:12px 0;">

            <!-- Danh sách tài liệu -->
            <div>
                <strong style="color:#4CAF50;">Tài liệu:</strong>

                <?php if (!empty($lesson['materials'])): ?>
                    <ul style="list-style:none; padding-left:0; margin-top:10px;">
                        <?php foreach ($lesson['materials'] as $m): ?>
                            <li style="
                                margin-bottom:8px;
                                padding:8px 12px;
                                background:#fff;
                                border:1px solid #e0e0e0;
                                border-radius:8px;
                                display:flex;
                                justify-content:space-between;
                                align-items:center;
                            ">
                                <span>📄 <?= htmlspecialchars($m['filename']) ?></span>

                      
                            </li>
                        <?php endforeach; ?>
                    </ul>

                <?php else: ?>
                    <p style="color:#888; margin-top:10px; font-style:italic;">
                        Không có tài liệu cho bài học này.
                    </p>
                <?php endif; ?>
            </div>

        </div>

    <?php endforeach; ?>
</div>

<?php endif; ?>
<a href="<?= BASE_URL ?>/enrollment/progressList">
    <button class="btn btn-primary">⬅ Quay lại tiến độ học tập</button>
</a>
<?php include VIEW_PATH . "/layouts/footer.php"; ?>
