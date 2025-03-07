<?php
// Ví dụ: Kết nối với cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lumos_books";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM orders";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Đơn hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="orders.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Lumos Books</h2>
            </div>
            <nav>
                <ul>
                <li><a href="admin.html" ><i class="fas fa-tachometer-alt"></i><span>Trang chủ</span></a></li>
                    <li><a href="#"><i class="fas fa-users"></i><span>Quản lý người dùng</span></a></li>
                    <li><a href="products.php"><i class="fas fa-box"></i><span>Quản lý sản phẩm</span></a></li>
                    <li><a href="orders.php" class="active"><i class="fas fa-shopping-cart"></i><span>Quản lý đơn hàng</span></a></li>
                    <li><a href="#"><i class="fas fa-cogs"></i><span>Cài đặt</span></a></li>
                    <li><a href="#"><i class="fas fa-sign-out-alt"></i><span>Thoát</span></a></li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            <header>
                <div class="menu-toggle" id="menu-toggle">☰</div>
                <div class="user-info">
                    <span>Chào, Admin</span>
                    <img src="https://via.placeholder.com/40" alt="Avatar" />
                </div>
            </header>

            <section class="table-section">
                <h2>Danh sách Đơn hàng</h2>
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã Đơn hàng</th>
                            <th>Người Mua</th>
                            <th>Sản phẩm</th>
                            <th>Ngày Đặt hàng</th>
                            <th>Tình trạng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            $index = 1;
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $index++ . "</td>
                                        <td>" . $row['order_id'] . "</td>
                                        <td>" . $row['customer_name'] . "</td>
                                        <td>" . $row['product_name'] . "</td>
                                        <td>" . $row['order_date'] . "</td>
                                        <td>" . $row['status'] . "</td>
                                        <td><button class='btn-process'>Xử lý</button><button class='btn-delete'>Xóa</button></td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>Không có đơn hàng nào.</td></tr>";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
    <script src="script.js"></script>
</body>
</html>
