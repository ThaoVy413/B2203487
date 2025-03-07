<?php
session_start();

// Initialize error variables
$MaSachErr = $TenSachErr = $MaTGErr = $MaTLErr = $DongiaErr = "";
$MaSach = $TenSach = $MaTG = $MaTL = $Dongia = $LoaiBia = $KichThuoc = $MoTa = $NgonNgu = $MaNXB =  "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from form
    $MaSach = $_POST['MaSach'];
    $TenSach = $_POST['TenSach'];
    $MoTa = $_POST['MoTa'];
    $NgonNgu = $_POST['NgonNgu'];
    $NamXB = $_POST['NamXB'];
    $MaTG = $_POST['MaTG'];
    $MaTL = $_POST['MaTL'];
    $KichThuoc = $_POST['KichThuoc'];
    $SoTrang = $_POST['SoTrang'];
    $LoaiBia = $_POST['LoaiBia'];
    $MaNXB = $_POST['MaNXB'];
    $Dongia = $_POST['Dongia'];

    // Validation for required fields
    if (empty($MaSach)) {
        $MaSachErr = "* Mã Sách là bắt buộc!";
    }
    if (empty($TenSach)) {
        $TenSachErr = "* Tên Sách là bắt buộc!";
    }
    if (empty($MaTG)) {
        $MaTGErr = "* Mã Tác Giả là bắt buộc!";
    }
    if (empty($MaTL)) {
        $MaTLErr = "* Mã Thể Loại là bắt buộc!";
    }
    if (empty($Dongia)) {
        $DongiaErr = "* Đơn Giá là bắt buộc!";
    }

    // If no errors, proceed with database insertion
    if (empty($MaSachErr) && empty($TenSachErr) && empty($MaTGErr) && empty($MaTLErr) && empty($DongiaErr)) {
        // Kết nối cơ sở dữ liệu
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cuahangbansach";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert book data into database
        $stmt_sach = $conn->prepare("INSERT INTO SACH (MaSach, TenSach, MoTa, NgonNgu, NamXB, MaTG, MaTL) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt_sach->bind_param("sssssss", $MaSach, $TenSach, $MoTa, $NgonNgu, $NamXB, $MaTG, $MaTL);

        if ($stmt_sach->execute()) {
            $stmt_ttkt = $conn->prepare("INSERT INTO THONG_TIN_KY_THUAT (MaSach, KichThuoc, SoTrang, LoaiBia) VALUES (?, ?, ?, ?)");
            $stmt_ttkt->bind_param("ssss", $MaSach, $KichThuoc, $SoTrang, $LoaiBia);

            if ($stmt_ttkt->execute()) {
                $stmt_nhaxb = $conn->prepare("INSERT INTO NHA_XUAT_BAN (MaNXB, TenNXB) VALUES (?, ?)");
                $stmt_nhaxb->bind_param("ss", $MaNXB, $TenNXB); // Assuming 'Tên nhà xuất bản' is predefined
                $stmt_nhaxb->execute();

                $stmt_dongia = $conn->prepare("INSERT INTO DON_GIA (DonGia, MaSach) VALUES (?, ?)");
                $stmt_dongia->bind_param("ds", $Dongia, $MaSach);
                $stmt_dongia->execute();

                $_SESSION['success'] = "Sách đã được thêm thành công!";
                header("Location: products.php");
                exit();
            } else {
                $_SESSION['error'] = "Lỗi khi thêm thông tin kỹ thuật!";
            }
        } else {
            $_SESSION['error'] = "Lỗi khi thêm sách!";
        }

        // Close the database connection
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nhập Sách</title>
    <link rel="stylesheet" href="add_product.css">
</head>
<body>
    <div class="container">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h1>Nhập Sách Mới</h1>
            
            <?php
            // Display error message if exists
            if (isset($_SESSION['error'])) {
                echo '<div class="error-message">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']);
            }
            ?>

            <div class="form-grid">
                <!-- Column 1 -->
                <div class="form-group">
                    <label for="masach">Mã Sách</label>
                    <input type="text" id="masach" name="MaSach" value="<?php echo $MaSach; ?>" required>
                    <span class="error"><?php echo $MaSachErr; ?></span>
                </div>

                <div class="form-group">
                    <label for="loaibia">Loại Bìa</label>
                    <input type="text" id="loaibia" name="LoaiBia" value="<?php echo $LoaiBia; ?>">
                </div>

                <div class="form-group">
                    <label for="tensach">Tên Sách</label>
                    <input type="text" id="tensach" name="TenSach" value="<?php echo $TenSach; ?>" required>
                    <span class="error"><?php echo $TenSachErr; ?></span>
                </div>

                <div class="form-group">
                    <label for="nxb">Nhà Xuất Bản</label>
                    <input type="text" id="nxb" name="MaNXB" value="<?php echo $MaNXB; ?>">
                </div>

                <!-- Column 2 -->
                <div class="form-group">
                    <label for="MaTG">Mã Tác Giả</label>
                    <input type="text" id="MaTG" name="MaTG" value="<?php echo $MaTG; ?>" required>
                    <span class="error"><?php echo $MaTGErr; ?></span>
                </div>

                <div class="form-group">
                    <label for="namxb">Năm Xuất Bản</label>
                    <input type="number" id="namxb" name="NamXB" value="<?php echo $NamXB; ?>">
                </div>

                <div class="form-group">
                    <label for="theloai">Thể Loại</label>
                    <input type="text" id="theloai" name="MaTL" value="<?php echo $MaTL; ?>" required>
                    <span class="error"><?php echo $MaTLErr; ?></span>
                </div>

                <div class="form-group">
                    <label for="kichthuoc">Kích Thước</label>
                    <input type="text" id="kichthuoc" name="KichThuoc" value="<?php echo $KichThuoc; ?>">
                </div>

                <div class="form-group">
                    <label for="dongia">Đơn Giá</label>
                    <input type="number" id="dongia" name="Dongia" step="0.01" value="<?php echo $Dongia; ?>" required>
                    <span class="error"><?php echo $DongiaErr; ?></span>
                </div>

                <div class="form-group">
                    <label for="sotrang">Số Trang</label>
                    <input type="number" id="sotrang" name="SoTrang" value="<?php echo $SoTrang; ?>">
                </div>

                <div class="form-group">
                    <label for="ngonngu">Ngôn Ngữ</label>
                    <input type="text" id="ngonngu" name="NgonNgu" value="<?php echo $NgonNgu; ?>">
                </div>

                <div class="form-group">
                    <label for="mota">Mô Tả</label>
                    <textarea id="mota" name="MoTa"><?php echo $MoTa; ?></textarea>
                </div>
            </div>

            <button type="submit">Thêm Sách</button>
        </form>
    </div>
</body>
</html>
