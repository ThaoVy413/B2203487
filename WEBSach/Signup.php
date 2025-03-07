<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cuahangbansach";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Lỗi kết nối CSDL!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $matkhau = $_POST["password"];
    $hoten = $_POST["name"];
    $sdt = $_POST["phone"];

    $hashed_password = password_hash($matkhau, PASSWORD_DEFAULT);

    $sql = "INSERT INTO khach_hang (Email, MatKhau, HoTen, SDT) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $email, $hashed_password, $hoten, $sdt);
    $stmt->execute();
    
    $stmt->close();
    $conn->close();

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
    <title>Đăng Ký - Lumos Books</title>
    <link rel="stylesheet" href="Signup.css">
    <link rel="stylesheet" href="style1.css">
</head>
<body class="register-page">
    <header>
        <div class="top-bar">
            <div class="glow-text">Lumos Books</div>
            <nav class="menu">
                <a href="TrangChu.php">Trang chủ</a>
                <a href="#">Liên hệ</a>
                <a href="Signup.php">Đăng ký</a>
                <a href="Login.php">Đăng nhập</a>
                <a href="#cart"><i class="bi bi-cart"></i>Giỏ hàng (<span id="cart-count">0</span>)</a>
            </nav>
        </div>
    </header>
    
    <div class="register-container">
        <div class="register-form">
            <h2>Đăng Ký Tài Khoản</h2>
            <form action="" method="POST" onsubmit="return validateForm()">
                <div class="input-group">
                    <label for="name">Họ và tên:</label>
                    <input type="text" id="name" name="name" onblur="validateName()">
                    <span class="error-message" id="nameError"></span>
                </div>
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" onblur="validateEmail()">
                    <span class="error-message" id="emailError"></span>
                </div>
                <div class="input-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="tel" id="phone" name="phone" onblur="validatePhone()">
                    <span class="error-message" id="phoneError"></span>
                </div>
                <div class="input-group">
                    <label for="password">Mật khẩu:</label>
                    <input type="password" id="password" name="password" onblur="validatePassword()">
                    <span class="error-message" id="passwordError"></span>
                </div>
                <div class="input-group">
                    <label for="confirm-password">Xác nhận mật khẩu:</label>
                    <input type="password" id="confirm-password" name="confirm-password" onblur="validateConfirmPassword()">
                    <span class="error-message" id="confirmPasswordError"></span>
                </div>
                <button type="submit" class="btn-fill">Đăng ký</button>
                <p class="signin-link">Đã có tài khoản? <a href="Login.php">Đăng nhập</a></p>
            </form>
        </div>
    </div>
</body>
</html>
