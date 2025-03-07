<?php
session_start();
include 'db_connect.php';

// Kiểm tra nếu không có tham số MaGH được truyền
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Lỗi: Không tìm thấy ID giỏ hàng hợp lệ!");
}

$cart_id = $_GET['id']; // Lấy ID từ URL

// Kiểm tra kết nối SQL
if (!$conn) {
    die("Lỗi kết nối CSDL: " . mysqli_connect_error());
}

// Chuẩn bị câu lệnh SQL để xóa sản phẩm khỏi giỏ hàng
$stmt = $conn->prepare("DELETE FROM gio_hang WHERE MaGH = ?");
if ($stmt === false) {
    die("Lỗi chuẩn bị truy vấn: " . $conn->error);
}

$stmt->bind_param("i", $cart_id); // "i" nghĩa là kiểu INT
if ($stmt->execute()) {
    // Chuyển hướng về trang giỏ hàng sau khi xóa thành công
    header("Location: cart.php");
    exit();
} else {
    echo "Lỗi SQL khi xóa: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
