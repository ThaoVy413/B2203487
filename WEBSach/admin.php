<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
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
                    <li><a href="admin.html" class="active"><i class="fas fa-tachometer-alt"></i><span>Trang chủ</span></a></li>
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
                <br>
                <div class="user-info">
                    <span>Chào, Admin</span>
                    <img src="https://via.placeholder.com/40" alt="Avatar" />
                </div>
            </header>

            <section class="dashboard">
                <div class="card">
                    <h2>Tổng số người dùng</h2>
                    <p>1000</p>
                </div>
                <div class="card">
                    <h2>Tổng số đơn hàng</h2>
                    <p>250</p>
                </div>
                <div class="card">
                    <h2>Tổng doanh thu</h2>
                    <p>5,000,000 VNĐ</p>
                </div>
            </section>

            <section class="table-section">
                <h2>Danh sách người dùng</h2>
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Ngày đăng ký</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Nguyễn Văn A</td>
                            <td>a@gmail.com</td>
                            <td>01/01/2022</td>
                            <td><button class="btn-edit">Sửa</button><button class="btn-delete">Xóa</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Trần Thị B</td>
                            <td>b@gmail.com</td>
                            <td>05/03/2022</td>
                            <td><button class="btn-edit">Sửa</button><button class="btn-delete">Xóa</button></td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
    <script src="script.js"></script>
</body>
</html>
