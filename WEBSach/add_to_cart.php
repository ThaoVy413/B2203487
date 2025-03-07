<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['MaTK'])) {
    echo "error"; // Chưa đăng nhập
    exit();
}

$customer_id = $_SESSION['MaTK'];
$product_id = $_POST['product_id'] ?? '';

if (!empty($product_id)) {
    $conn->begin_transaction(); // Bắt đầu transaction để tránh lỗi đồng thời

    try {
        // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
        $stmt = $conn->prepare("SELECT soluong FROM gio_hang WHERE MaTK = ? AND MaSach = ?");
        $stmt->bind_param("ss", $customer_id, $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Nếu đã có, tăng số lượng
            $stmt = $conn->prepare("UPDATE gio_hang SET soluong = soluong + 1 WHERE MaTK = ? AND MaSach = ?");
        } else {
            // Nếu chưa có, thêm sản phẩm mới
            $stmt = $conn->prepare("INSERT INTO gio_hang (MaTK, MaSach, soluong) VALUES (?, ?, 1)");
        }
        $stmt->bind_param("ss", $customer_id, $product_id);
        $stmt->execute();

        $conn->commit(); // Xác nhận transaction
        echo "success";

    } catch (Exception $e) {
        $conn->rollback(); // Hoàn tác nếu có lỗi
        echo "error";
    }
} else {
    echo "error";
}
?>
