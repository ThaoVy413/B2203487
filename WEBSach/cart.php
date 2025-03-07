<?php
session_start();
include 'db_connect.php'; // Kết nối CSDL

// Kiểm tra đăng nhập
if (!isset($_SESSION['MaTK'])) {
    die("Vui lòng đăng nhập để xem giỏ hàng.");
}

$customer_id = $_SESSION['MaTK'];

// Truy vấn giỏ hàng
$sql = "SELECT c.MaGH, p.TenSach, 
               (SELECT MAX(DonGia) FROM don_gia WHERE MaSach = c.MaSach) AS DonGia, 
               c.soluong, 
               (SELECT MAX(DonGia) FROM don_gia WHERE MaSach = c.MaSach) * c.soluong AS total
        FROM gio_hang c
        JOIN sach p ON c.MaSach = p.MaSach
        WHERE c.MaTK = ?";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Lỗi chuẩn bị truy vấn: " . $conn->error);
}

$stmt->bind_param("s", $customer_id);
$stmt->execute();
$result = $stmt->get_result(); // Lấy kết quả

if (!$result) {
    die("Lỗi truy vấn: " . $stmt->error);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(245, 245, 245);
            text-align: center;
        }
        h2 {
            color: #d63384;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #ffb3c6;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #ffe6ea;
        }
        a {
            text-decoration: none;
            color: white;
            background-color: #ff69b4;
            padding: 8px 12px;
            border-radius: 5px;
            display: inline-block;
            margin: 10px;
        }
        a:hover {
            background-color: #d63384;
        }
        .delete-link {
            background-color: #ff4d4d;
        }
        .delete-link:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <h2>Giỏ hàng của bạn</h2>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>Chọn</th>
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng</th>
            <th>Xóa</th>
        </tr>
        
        <?php 
        $total_price = 0; 
        while ($row = $result->fetch_assoc()) { 
        ?>
            <tr>
                <td><input type="checkbox" name="select_product"></td>
                <td><?= htmlspecialchars($row['TenSach']) ?></td>
                <td><?= number_format($row['DonGia']) ?> VNĐ</td>
                <td>
                    <button>-</button>
                    <?= $row['soluong'] ?>
                    <button>+</button>
                </td>
                <td><?= number_format($row['total']) ?> VNĐ</td>
                <td>
                    <a href="remove_from_cart.php?id=<?= $row['MaGH'] ?>" class="delete-link" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng không?');">
                        ❌ Xóa
                    </a>
                </td>
            </tr>
        <?php 
            $total_price += $row['total'];
        } ?>

<tr>
    <td colspan="5"><strong>Tổng cộng:</strong></td>
    <td><span id="total-price">0 VND</span></td>
</tr>

    </table>

    <a href="TrangChu-KH.html">Tiếp tục mua sắm</a>
    <a href="checkout.php">Thanh toán</a>
    <script>
        function updateTotal() {
    let total = 0;
    document.querySelectorAll('.cart-item').forEach(row => {
        let checkbox = row.querySelector('.select-item');
        let price = parseInt(row.querySelector('.item-price').textContent.replace(/\D/g, ''), 10);
        let quantity = parseInt(row.querySelector('.item-quantity').value, 10);

        if (checkbox.checked) {
            total += price * quantity;
        }
    });
    document.getElementById('total-price').textContent = total.toLocaleString() + " VND";
}

// Gắn sự kiện khi checkbox thay đổi
document.querySelectorAll('.select-item').forEach(checkbox => {
    checkbox.addEventListener('change', updateTotal);
});

// Gắn sự kiện khi số lượng thay đổi
document.querySelectorAll('.item-quantity').forEach(input => {
    input.addEventListener('change', updateTotal);
});

// Gọi updateTotal() khi trang load
document.addEventListener('DOMContentLoaded', updateTotal);

    </script>
</body>
</html>
