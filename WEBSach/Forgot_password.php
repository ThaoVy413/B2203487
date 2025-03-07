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

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$error_email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    if (empty($email)) {
        $error_email = "Vui lòng nhập email!";
    } else {
        $query = "SELECT Email FROM khach_hang WHERE Email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $verification_code = rand(100000, 999999);
            $expiry = date("Y-m-d H:i:s", strtotime("+10 minutes"));
            $hashed_code = password_hash($verification_code, PASSWORD_DEFAULT); // Băm mã

            $insertCode = $conn->prepare("INSERT INTO datlai_matkhau (email, verification_code, expiry) 
                                          VALUES (?, ?, ?) 
                                          ON DUPLICATE KEY UPDATE verification_code=?, expiry=?");
            $insertCode->bind_param("sssss", $email, $hashed_code, $expiry, $hashed_code, $expiry);
            $insertCode->execute();

            $_SESSION['email'] = $email;

            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ngoquynh30041997@gmail.com';
                $mail->Password = 'putd qwzf dwop xpaq';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('your-email@gmail.com', 'Lumos Books');
                $mail->addAddress($email);
                $mail->Subject = 'Verify Code';
                $mail->isHTML(true);
                $mail->Body = "<p>Mã xác nhận của bạn là: <strong>$verification_code</strong></p><p>Mã này có hiệu lực trong 10 phút.</p>";

                $mail->send();
                header("Location: Verify_code.php");
                exit();
            } catch (Exception $e) {
                $error_email = "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
            }
        } else {
            $error_email = "Email không tồn tại trong hệ thống!";
        }
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
            <h2>Quên Mật Khẩu</h2>
            <form action="" method="POST">
                <div class="input-group">
                    <label>Email:</label>
                    <input type="email" name="email" required>
                </div>
                <button type="submit" class="btn-fill">Gửi mã xác nhận</button>
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
