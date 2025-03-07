<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cuahangbansach";

// Kết nối MySQL
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy từ khóa tìm kiếm
$keyword = isset($_GET['q']) ? $_GET['q'] : '';
$max_price = isset($_GET['price']) ? (int)$_GET['price'] : 100000000; // Giới hạn mặc định

$sql = "SELECT sach.MaSach, sach.TenSach, tac_gia.TenTG, sach.Hinh, sach.Gia
        FROM sach
        LEFT JOIN tac_gia ON sach.MaTG = tac_gia.MaTG
        WHERE (sach.TenSach LIKE ? OR tac_gia.TenTG LIKE ?) 
        AND sach.Gia <= ?
        LIMIT 10";

$stmt = $conn->prepare($sql);
$param = "%" . $keyword . "%";
$stmt->bind_param("ssi", $param, $param, $max_price);
$stmt->execute();
$result = $stmt->get_result();

$books = [];
while ($row = $result->fetch_assoc()) {
    $books[] = $row;
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($books);
?>
