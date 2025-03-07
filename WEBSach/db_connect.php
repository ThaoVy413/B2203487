<?php
$servername = "localhost"; // Đổi nếu cần
$username = "root"; // Đổi nếu có mật khẩu
$password = "";
$dbname = "cuahangbansach"; // Tên database từ file SQL

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>

