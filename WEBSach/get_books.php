<?php
header("Content-Type: application/json");
$servername = "localhost";
$username = "root"; // Thay đổi nếu cần
$password = ""; // Thay đổi nếu có mật khẩu
$database = "cuahangbansach";

// Kết nối MySQL
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die(json_encode(["error" => "Kết nối thất bại: " . $conn->connect_error]));
}

// Truy vấn JOIN để lấy thông tin sách và đơn giá
$sql = "SELECT DISTINCT sach.MaSach, sach.TenSach, sach.Hinh, don_gia.DonGia 
        FROM sach 
        JOIN don_gia ON sach.MaSach = don_gia.MaSach";

$result = $conn->query($sql);

$books = [];
while ($row = $result->fetch_assoc()) {
    // Kiểm tra và sửa đường dẫn nếu cần
    $row['Hinh'] = 'img_book/' . $row['Hinh']; 
    $books[] = $row;
}

echo json_encode($books);
$conn->close();
?>
