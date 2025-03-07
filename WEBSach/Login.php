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

$error_email = $error_password = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $matkhau = trim($_POST['password']);

    if (empty($email)) {
        $error_email = "Vui lòng nhập email!";
    }
    if (empty($matkhau)) {
        $error_password = "Vui lòng nhập mật khẩu!";
    }


    if (empty($error_email) && empty($error_password)) {
        if (kiem_tra_dang_nhap($conn, $email, $matkhau, "quan_tri_vien", "admin.php"))
            exit();
        if (kiem_tra_dang_nhap($conn, $email, $matkhau, "khach_hang", "trangchu.html"))
            exit();
        if (kiem_tra_dang_nhap($conn, $email, $matkhau, "nhan_vien", "employee.html"))
            exit();

        $error_password = "Email hoặc mật khẩu không chính xác!";
    }
}
function kiem_tra_dang_nhap($conn, $email, $matkhau, $bang, $trang)
{
    $query = "SELECT Email, MatKhau FROM $bang WHERE Email = ?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        die("Lỗi truy vấn: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($matkhau, $row["MatKhau"])) {
            $_SESSION['user_email'] = $row["Email"];
            $_SESSION['role'] = $bang;
            header("Location: $trang");
            exit();
        }
    }
    return false;
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
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <header>
        <div class="top-bar">
            <div class="glow-text">Lumos Books</div>
            <nav class="menu">
                <a href="TrangChu.php">Trang chủ</a>
                <a href="#">Liên hệ</a>
                <a href="Signup.php">Đăng ký</a>
                <a href="Login.php">Đăng nhập</a>
                <a href="#cart"><i class="bi bi-cart"></i> Giỏ hàng (<span id="cart-count">0</span>)</a>
            </nav>
        </div>
    </header>

    <div class="login-container">
        <div class="login-form">
            <h2>Đăng Nhập</h2>
            <form action="" method="POST">
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>" required>
                </div>

                <div class="input-group">
                    <label for="password">Mật khẩu:</label>
                    <input type="password" id="password" name="password" required>
                    <div class="forgot-password">
                        <a href="Forgot_password.php">Quên mật khẩu?</a>
                    </div>
                </div>
                <?php if (!empty($error_email) || !empty($error_password)): ?>
                    <div
                        style="color: red; font-size: 14px; font-weight: bold; text-align: center;  padding: 10px; border-radius: 5px; margin-bottom: 10px;">
                        <?= htmlspecialchars($error_email ?: $error_password) ?>
                    </div>
                <?php endif; ?>

                <button type="submit" class="btn-fill">Đăng nhập</button>

                <p class="signup-link">Chưa có tài khoản? <a href="Signup.php">Đăng ký</a></p>
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