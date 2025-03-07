<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Bookstore Homepage</title>
    <link rel="stylesheet" href="TrangChu.css">
</head>
<body>
    <header>
        <div class="top-bar">
            <div class="glow-text">Lumos Books</div>
            <div class="search-container">
                <input type="text" id="search-input" placeholder="Tìm kiếm sách..." onkeyup="searchBooks()">
                <button onclick="searchBooks()"><i class="bi bi-search"></i></button>
                <div id="search-suggestions" class="suggestions"></div>
            </div>
            
            <nav class="menu">
                <a href="TrangChu.php">Trang chủ</a>
                <a href="#">Liên hệ</a>
                <a href="Signup.php">Đăng Ký </a>
                <a href="Login.php">Đăng Nhập</a>
                <a href="cart.php"><i class="bi bi-cart"></i> Giỏ hàng (<span id="cart-count">0</span>)</a>
            </nav>
        </div>
    </header>
    
    <div class="bantin">
        <button class="prev" onclick="plusSlides(-1)">&#10094;</button>
        <div class="slideshow-container">
            <div class="slides fade"><img src="images/banner.webp" style="width:100%"></div>
            <div class="slides fade"><img src="images/banner1.webp" style="width:100%"></div>
            <div class="slides fade"><img src="images/banner2.webp" style="width:100%"></div>
        </div>
        <button class="next" onclick="plusSlides(1)">&#10095;</button>
    </div>

    <section class="features">
        <div class="feature-item"><i class="bi bi-truck"></i><div class="feature-text"><div class="title">FREESHIP</div><div class="subtitle">Miễn phí vận chuyển</div></div></div>
        <div class="feature-item"><i class="bi bi-arrow-repeat"></i><div class="feature-text"><div class="title">HOÀN TRẢ</div><div class="subtitle">Đổi trả dễ dàng</div></div></div>
        <div class="feature-item"><i class="bi bi-credit-card"></i><div class="feature-text"><div class="title">THANH TOÁN</div><div class="subtitle">Thanh toán tiện lợi</div></div></div>
        <div class="feature-item"><i class="bi bi-headset"></i><div class="feature-text"><div class="title">HỖ TRỢ</div><div class="subtitle">Hỗ trợ 24/7</div></div></div>
    </section>
    
    <section class="banner">
        <h2>DANH SÁCH SẢN PHẨM <img src="images/decor.jpg" alt="Họa tiết" class="decor"></h2>
    </section>
    
    <div class="product-list" id="product-list"></div>
    
    <div id="product-details" class="popup">
        <div class="popup-content">
            <span class="close-btn" onclick="hideProductDetails()">&times;</span>
            <div class="popup-left"><img id="popup-img" src="" alt="Sách"></div>
            <div class="popup-right">
                <h3 id="popup-title">Tên Sách</h3>
                <p id="popup-price" class="popup-price">Giá: </p>
                <p id="popup-description">Mô tả sách</p>
                <button id="add-to-cart-popup">Thêm vào giỏ hàng</button>

            </div>
        </div>
    </div>

    <script src="TrangChu.js"></script>
    <footer class="footer">
        <div class="brand">Lumos Books</div>
        <ul class="contact-info">
            <li><i class="bi bi-geo-alt"></i> Trường Đại học Cần Thơ, Khu II, Cần Thơ</li>
            <li><i class="bi bi-telephone"></i> 1900 6750</li>
            <li><i class="bi bi-envelope"></i> support@lumosbooks.vn</li>
        </ul>
        <div class="provided-by">Cung cấp bởi <strong>Lumos Books</strong></div>
    </footer>
</body>
</html>
