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

// Lấy danh sách sản phẩm
$sql = "SELECT * FROM sach";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="products.css">
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
                <li><a href="admin.php" ><i class="fas fa-tachometer-alt"></i><span>Trang chủ</span></a></li>
                    <li><a href="#"><i class="fas fa-users"></i><span>Quản lý người dùng</span></a></li>
                    <li><a href="products.php" class="active"><i class="fas fa-box"></i><span>Quản lý sản phẩm</span></a></li>
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

            <section class="dashboard">
                <div class="card">
                    <h2>Tổng số sản phẩm</h2>
                    <p>500</p>
                </div>
                <div class="card">
                    <h2>Sản phẩm hết hàng</h2>
                    <p>20</p>
                </div>
                <div class="card">
                    <h2>Sản phẩm bán chạy</h2>
                    <p>100</p>
                </div>
            </section>

            <section class="table-section">
                <div>
                <h2>Danh sách sản phẩm</h2>
                <a href="add_product.php" class="btn-add-product">Thêm sách mới</a>
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Ngày thêm</th>
                            <th >Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $sql = "SELECT distinct sach.masach, sach.tensach, sach.ngaytao, dg.dongia
                                FROM sach
                                JOIN don_gia dg ON sach.masach = dg.masach";
                        
                        // Thực thi câu truy vấn và kiểm tra lỗi
                        $result = $conn->query($sql);
                        
                        if ($result === false) {
                            // Nếu câu truy vấn có lỗi, in ra lỗi SQL
                            die("Lỗi câu truy vấn: " . $conn->error);
                        }
                        $date=date('d-m-Y');
                        if ($result->num_rows > 0) {
                            // Nếu có kết quả, hiển thị các dòng
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>" . $row["masach"] . "</td>
                                    <td>" . $row["tensach"] . "</td>
                                    <td>" . number_format($row["dongia"], 0, ',', '.') . " VNĐ</td>
                                    <td>" . $row["ngaytao"] . "</td>



                                    <td class='action-column'>
                                        <a href='edit_product.php?id=" . $row["masach"] . "' class='btn-edit'>Sửa</a>
                                        <a href='delete_product.php?id=" . $row["masach"] . "' class='btn-delete'>Xóa</a>
                                        <a href='view_product.php?id=" . $row["masach"] . "' class='btn-view-details'>Xem chi tiết</a>

                                    </td>
                                </tr>";
                            }
                        } else {
                            // Nếu không có sản phẩm nào
                            echo "<tr><td colspan='5'>Không có sản phẩm nào.</td></tr>";
                        }
                        ?>
                       
</div>
                        
                    </tbody>
                </table>
            </section>
        </main>
    </div>
    <script src="confirmDelete.js"></script>
    <script src="script.js"></script>
</body>
</html>

<?php
// Đóng kết nối
$conn->close();
?>
