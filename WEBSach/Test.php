<?php
// Cần tải thư viện PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Nếu bạn cài qua Composer, đừng quên đường dẫn tới autoload.php

$mail = new PHPMailer(true);  // Tạo đối tượng PHPMailer

try {
    // Cấu hình server gửi email
    $mail->isSMTP();                                         
    $mail->Host       = 'smtp.gmail.com';  // Địa chỉ máy chủ SMTP (ví dụ SMTP của Gmail)
    $mail->SMTPAuth   = true;                                 
    $mail->Username   = 'ngoquynh30041997@gmail.com';                // Tên người dùng SMTP
    $mail->Password   = 'putd qwzf dwop xpaq';                 // Mật khẩu email
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        
    $mail->Port       = 587;                                  

    // Nhận và gửi email
    $mail->setFrom('from_email@example.com', 'Mailer');
    $mail->addAddress('recipient@example.com', 'Joe User');     // Thêm người nhận

    $mail->isHTML(true);                                  // Thiết lập định dạng email
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the <b>HTML</b> message body in bold!';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
