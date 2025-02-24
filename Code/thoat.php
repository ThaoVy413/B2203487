<?php
// Bắt đầu phiên làm việc (session)
session_start();

// Xóa tất cả các giá trị trong session
session_unset();  // Xóa tất cả các biến trong session

// Hủy session
session_destroy();  // Hủy toàn bộ session

// Xóa các cookie: đặt thời gian hết hạn trong quá khứ
setcookie("user", "", time() - 3600, "/");  
setcookie("fullname", "", time() - 3600, "/"); 
setcookie("id", "", time() - 3600, "/");  

// Chuyển hướng người dùng về trang đăng nhập hoặc trang chính
header("Location: login.php");  
exit();  // Dừng chương trình sau khi chuyển hướng
?>
