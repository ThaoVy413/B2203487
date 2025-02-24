<?php
// Bắt đầu session để lấy thông tin người dùng đã đăng nhập
session_start();
// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['user'])) {
    header("Location: login.php");  // Nếu chưa đăng nhập, chuyển về trang đăng nhập
    exit();
}

// Lấy thông tin người dùng từ session
$email = $_SESSION['user'];  // Email của người dùng đã đăng nhập
$id = $_SESSION['id'];       // ID của người dùng
// Kết nối với cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanhang";
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Xử lý khi người dùng gửi form thay đổi mật khẩu
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Truy vấn mật khẩu cũ từ cơ sở dữ liệu
    $sql = "SELECT password FROM customers WHERE email = '$email'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row && md5($old_password) == $row['password']) {  // Kiểm tra mật khẩu cũ
        if ($new_password == $confirm_password) {  // Kiểm tra mật khẩu mới và xác nhận
            if (md5($new_password) != $row['password']) {  // Mật khẩu mới không giống mật khẩu cũ
                // Băm mật khẩu mới và cập nhật vào CSDL
                $new_password_hashed = md5($new_password);
                $update_sql = "UPDATE customers SET password = '$new_password_hashed' WHERE id = '$id'";
                if ($conn->query($update_sql) === TRUE) {
                    echo "Mật khẩu đã được thay đổi thành công.";
                } else {
                    echo "Lỗi khi cập nhật mật khẩu: " . $conn->error;
                }
            } else {
                echo "Mật khẩu mới không được trùng với mật khẩu cũ.";
            }
        } else {
            echo "Mật khẩu mới và mật khẩu xác nhận không khớp.";
        }
    } else {
        echo "Mật khẩu cũ không đúng.";
    }
}

$conn->close();
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Thay đổi mật khẩu</title>
    <style>
        form{
            width: 300px;
            margin: 50px auto;
            align-items: center; /* Căn giữa các input */
            padding: 20px 30px;
            border: 1px solid #ccc;
            border-radius: 10px;
            
        }
        form input {
            width: 100%;
            padding: 10px ;
            margin-top: 10px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }
        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        form input[type="submit"]:hover {
            background-color: #45a049;
        }
        h2 {
            text-align: center; /* Căn giữa nội dung của h2 */
            margin-bottom: 20px; /* Thêm khoảng cách dưới tiêu đề */
        }
    </style>
</head>
<body>
    <h2 >Thay đổi mật khẩu</h2>
    <form action="sua_mk.php" method="POST">
        <!-- Hiển thị email của người dùng đang đăng nhập -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $_SESSION['user']; ?>" readonly><br><br>

        <!-- Mật khẩu cũ -->
        <label for="old_password">Mật khẩu cũ:</label>
        <input type="password" id="old_password" name="old_password" required><br><br>

        <!-- Mật khẩu mới -->
        <label for="new_password">Mật khẩu mới:</label>
        <input type="password" id="new_password" name="new_password" required><br><br>

        <!-- Xác nhận mật khẩu mới -->
        <label for="confirm_password">Nhập lại mật khẩu mới:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>

        <input type="submit" value="Cập nhật mật khẩu">
    </form>
</body>
</html>
