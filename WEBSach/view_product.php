<?php
// Kết nối đến cơ sở dữ liệu (thay đổi thông tin kết nối của bạn)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cuahangbansach";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy ID sản phẩm từ URL
if (isset($_GET['id'])) {
    $masach = $_GET['id'];

    // Truy vấn chi tiết sản phẩm theo masach và lấy thêm thông tin từ các bảng liên quan
    $sql = "SELECT sach.masach, sach.tensach, sach.mota, sach.namxb, sach.ngonngu, sach.hinh, tg.hoten, tg.quequan, loai.tentl, dg.dongia, sach.ngaytao, ttkt.kichthuoc, ttkt.sotrang, ttkt.loaibia
            FROM sach
            JOIN don_gia dg ON sach.masach = dg.masach
            JOIN thong_tin_ky_thuat ttkt ON sach.masach = ttkt.masach
            JOIN tac_gia tg ON tg.matg = sach.matg
            JOIN the_loai loai ON loai.matl = sach.matl
            WHERE sach.masach = '$masach'";

    $result = $conn->query($sql);

    if ($result === false) {
        // Nếu câu truy vấn không thành công, in ra lỗi SQL
        die("Lỗi SQL: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo $masach;
        die("Sản phẩm không tồn tại.");
    }
} else {
    die("ID sản phẩm không hợp lệ.");
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="view_product.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Lumos Books</h2>
            </div>
            <nav>
                <ul>
                    <li><a href="admin.php"><i class="fas fa-tachometer-alt"></i><span>Trang chủ</span></a></li>
                    <li><a href="#"><i class="fas fa-users"></i><span>Quản lý người dùng</span></a></li>
                    <li><a href="products.php"><i class="fas fa-box"></i><span>Quản lý sản phẩm</span></a></li>
                    <li><a href="orders.php"><i class="fas fa-shopping-cart"></i><span>Quản lý đơn hàng</span></a></li>
                    <li><a href="#"><i class="fas fa-cogs"></i><span>Cài đặt</span></a></li>
                    <li><a href="#"><i class="fas fa-sign-out-alt"></i><span>Thoát</span></a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header>
                <div class="menu-toggle" id="menu-toggle">☰</div>
                <div class="user-info">
                    <span>Chào, Admin</span>
                    <img src="https://via.placeholder.com/40" alt="Avatar" />
                </div>
            </header>

            <section class="product-details">
                <h2><?php echo $product['tensach']; ?></h2>
                
                <div class="product-info">
               
                    <p><strong>Mã sách:</strong> <?php echo $product['masach']; ?></p>
                    <p><strong>Tên sách:</strong> <?php echo $product['tensach']; ?></p>
                    <p><strong>Tác giả - Quê quán:</strong> <?php 
                    echo (!empty($product['hoten']) ? $product['hoten'] : 'Chưa có thông tin tác giả') . " - " . 
                         (!empty($product['quequan']) ? $product['quequan'] : 'Chưa có thông tin quê quán');
                        ?></p>
                    <p><strong>Thể loại:</strong> <?php echo $product['tentl']; ?></p>
                    <p><strong>Giá:</strong> <?php echo number_format($product['dongia'], 0, ',', '.') . " VNĐ"; ?></p>
                    <p><strong>Thời điểm:</strong> <?php echo $product['ngaytao']; ?></p>
                    <p><strong>Ngôn ngữ:</strong> <?php echo $product['ngonngu']; ?></p>
                    <p><strong>Năm xuất bản:</strong> <?php echo $product['namxb']; ?></p>
                    <p><strong>Kích thước:</strong> <?php echo $product['kichthuoc']; ?></p>
                    <p><strong>Số trang:</strong> <?php echo $product['sotrang']; ?></p>
                    <p><strong>Loại bìa:</strong> <?php echo $product['loaibia']; ?></p>
                    <p><strong>Mô tả:</strong> <?php echo $product['mota']; ?></p>
                </div>

                <div class="actions">
                    <a href="edit_product.php?id=<?php echo $product['masach']; ?>" class="btn-edit">Sửa sản phẩm</a>
                    <a href="delete_product.php?id=<?php echo $product['masach']; ?>" class="btn-delete">Xóa sản phẩm</a>
                </div>
            </section>
        </main>
    </div>

    <script src="script.js"></script>
</body>
</html>

<?php
// Đóng kết nối
$conn->close();
?>
