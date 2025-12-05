<footer class="site-footer">
    <div class="container">
        <div class="footer-row">

            <!-- Col 1 -->
            <div class="footer-col">
                <div class="footer-logo">
                    <span>EduPress</span>
                </div>

                <p class="footer-desc">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.
                </p>
            </div>

            <!-- Col 2 -->
            <div class="footer-col">
                <h3 class="footer-title">GET HELP</h3>
                <ul class="footer-links">
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Latest Articles</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>

            <!-- Col 3 -->
            <div class="footer-col">
                <h3 class="footer-title">CONTACT US</h3>
                <ul class="footer-contact">
                    <li>Address: Hà Nội</li>
                    <li>Tel: + (123) 2500-567-8988</li>
                    <li>Mail: supportlms@gmail.com</li>
                </ul>
            </div>

        </div>

        <hr class="footer-line">

        <p class="footer-copy">
            Copyright © 2025 LearnPress LMS | Powered by ThimPress
        </p>
    </div>
</footer>


<style>
    .site-footer {
        background: #fff;
        padding: 40px 0 25px;
        font-family: Arial, sans-serif;
        color: #000;
    }

    .container {
        width: 90%;
        margin: auto;
    }

    /* 3 cột cân đều */
    .footer-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 40px;
        gap: 60px;
    }

    /* Logo + tên */
    .footer-logo {
        display: flex;
        align-items: center;
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 15px;
    }
    .footer-logo img {
        width: 28px;
        margin-right: 10px;
    }

    /* Mô tả */
    .footer-desc {
        width: 350px;
        font-size: 15px;
        line-height: 1.5;
        color: #333;
        margin-top: 10px;
    }

    /* Tiêu đề cột */
    .footer-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 18px;
    }

    /* Các link */
    .footer-links, .footer-contact {
        list-style: none;
        padding: 0;
        margin: 0;
        font-size: 15px;
        line-height: 1.8;
    }

    .footer-links li a {
        color: #000;
        text-decoration: none;
    }
    .footer-links li a:hover {
        color: #ff6600;
    }

    /* Line */
    .footer-line {
        border: none;
        border-top: 1px solid #e0e0e0;
        margin-bottom: 20px;
    }

    /* Copyright */
    .footer-copy {
        text-align: center;
        font-size: 14px;
        color: #666;
    }
</style>
