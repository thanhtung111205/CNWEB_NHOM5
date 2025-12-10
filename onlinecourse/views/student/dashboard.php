<?php include VIEW_PATH . '/layouts/header.php'; ?>
<?php include VIEW_PATH . '/layouts/sidebar.php'; ?>

<div class="student-content">
    <div class="student-box">
        <h2>🎓 Trang học viên</h2>
        <p class="sub-text">Chọn các chức năng bên trái để bắt đầu</p>

        </div>
    </div>
</div>
<style>
   /* --- KHÔNG BỊ ĐÈ BỞI SIDEBAR --- */
.student-content {
    margin-left: 250px;          
    padding: 40px 50px;
    background: #ffffff;         /* Nền trắng (xóa nền tím) */
    min-height: 100vh;
}


/* --- KHUNG BOX CHÍNH --- */
.student-box {
    background: #ffffff;
    padding: 35px;
    border-radius: 14px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.07);
    max-width: 900px;
    animation: fadeIn 0.4s ease;
    border-left: 6px solid #8c36ff; /* Viền tím đẹp */
    border-top: 5px solid #b47cff;  /* Thanh tiêu đề tím đậm */
}

/* --- TIÊU ĐỀ --- */
.student-box h2 {
    font-size: 32px;
    font-weight: 700;
    color: #7a23d8;     /* Tím đậm */
    margin-bottom: 10px;
}

/* --- SUB TEXT --- */
.sub-text {
    font-size: 18px;
    color: #4b177b;     /* tím nhẹ */
    margin-top: 5px;
}


/* --- Hiệu ứng fade --- */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}


</style>
<?php include VIEW_PATH . '/layouts/footer.php'; ?>
