<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cuahangbansach";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Lỗi kết nối CSDL!");
}

$error_password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = trim($_POST['new_password']);
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $email = $_SESSION['email'];

    $updatePassword = $conn->prepare("UPDATE khach_hang SET MatKhau = ? WHERE Email = ?");
    $updatePassword->bind_param("ss", $hashed_password, $email);
    $updatePassword->execute();

    header("Location: Login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Đăng Nhập - Lumos Books</title>
    <link rel="stylesheet" href="Login.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="top-bar">
            <div class="glow-text">Lumos Books</div>
            <nav class="menu">
                <a href="TrangChu.html">Trang chủ</a>
                <a href="#">Liên hệ</a>
                <a href="Signup.php">Đăng ký</a>
                <a href="Login.php">Đăng nhập</a>
                <a href="#cart"><i class="bi bi-cart"></i> Giỏ hàng (<span id="cart-count">0</span>)</a>
            </nav>
        </div>
    </header>

    <div class="login-container">
        <div class="login-form">
            <h2>Đặt Lại Mật Khẩu</h2>
            <form action="" method="POST">
                <div class="input-group">
                    <label>Mật khẩu mới:</label>
                    <input type="password" name="new_password" required>
                </div>
                <button type="submit" class="btn-fill">Xác nhận</button>
            </form>
        </div>
    </div>

    <footer class="footer">
        <div class="brand">Lumos Books</div>
        <ul class="contact-info">
            <li><i class="bi bi-geo-alt"></i>   </i> Trường Đại học Cần Thơ, Khu II, đường 3/2,P.Xuân Khánh, Q.Ninh Kiều, TP Cần Thơ</li></li>
            <li><i class="bi bi-telephone"></i> 1900 6750</li>
            <li><i class="bi bi-envelope"></i> support@lumosbooks.vn</li>
        </ul>
        <div class="provided-by">Cung cấp bởi <strong>Lumos Books</strong></div>
    </footer>
</body>

</html>

