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

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION['email'] ?? '';
    $user_code = trim($_POST['verification_code']);

    $stmt = $conn->prepare("SELECT verification_code, expiry FROM datlai_matkhau WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $hashed_code = $row['verification_code'];
        $expiry = $row['expiry'];

        if (password_verify($user_code, $hashed_code)) {
            if (strtotime($expiry) > time()) {
                $_SESSION['reset_allowed'] = true;
                header("Location: Reset_password.php");
                exit();
            } else {
                $error = "Mã xác nhận đã hết hạn!";
            }
        } else {
            $error = "Mã xác nhận không chính xác!";
        }
    } else {
        $error = "Không tìm thấy mã xác nhận!";
    }
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
            <h2>Nhập mã xác nhận</h2>
            <form action="" method="POST">
                <div class="input-group">
                    <label>Mã xác nhận:</label>
                    <input type="text" name="verification_code" required>
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
