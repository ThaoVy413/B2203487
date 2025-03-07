<?php
session_start();
ob_start(); // Bắt đầu bộ đệm đầu ra

include 'db_connect.php';

$customer_id = $_SESSION['MaTK'] ?? ''; 

if (!empty($customer_id)) {
    $stmt = $conn->prepare("DELETE FROM gio_hang WHERE MaTK = ?");
    $stmt->bind_param("s", $customer_id);
    $stmt->execute();
}

header("Location: TrangChu-KH.html");
exit();

ob_end_flush(); // Kết thúc bộ đệm đầu ra
?>
