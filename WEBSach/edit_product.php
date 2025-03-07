<?php
// Kết nối đến cơ sở dữ liệu
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

    // Lấy thông tin sản phẩm từ cơ sở dữ liệu theo câu truy vấn
    $sql = "SELECT sach.masach, sach.tensach, sach.mota, tg.hoten, loai.tentl, dg.dongia, ttkt.kichthuoc, ttkt.sotrang, ttkt.loaibia
        FROM sach
        JOIN don_gia dg ON sach.masach = dg.masach
        JOIN thong_tin_ky_thuat ttkt ON sach.masach = ttkt.masach
        JOIN tac_gia tg ON tg.matg = sach.matg
        JOIN the_loai loai ON loai.matl = sach.matl
        WHERE sach.masach = '$masach'";


    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $tensach = $row['tensach'];
        $mota = $row['mota'];
        $hoten_tacgia = $row['hoten'];
        $tentl = $row['tentl'];
        $dongia = $row['dongia'];
      
        $kichthuoc = $row['kichthuoc'];
        $sotrang = $row['sotrang'];
        $loaibia = $row['loaibia'];
    } else {
        echo "<p>Sản phẩm không tồn tại!</p>";
        exit;
    }
} else {
    echo "<p>ID sản phẩm không hợp lệ!</p>";
    exit;
}  

// Lưu thông tin sửa khi người dùng gửi form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tensach = $_POST['tensach'];
    $mota = $_POST['mota'];
    $matg = $_POST['matg'];
    $matl = $_POST['matl'];
    $dongia = $_POST['dongia'];
   
    $kichthuoc = $_POST['kichthuoc'];
    $sotrang = $_POST['sotrang'];
    $loaibia = $_POST['loaibia'];
    
    // Cập nhật thông tin sách
    $update_sql = "UPDATE sach SET tensach='$tensach', mota='$mota', matg='$matg', matl='$matl' WHERE masach='$masach'";
    $conn->query($update_sql);

    // Cập nhật thông tin tác giả
$sql_tg = "SELECT hoten FROM tac_gia WHERE matg='$matg'";
$result_tg = $conn->query($sql_tg);
if ($result_tg->num_rows > 0) {
    $tacgia_row = $result_tg->fetch_assoc();
    $tentg = $tacgia_row['hoten'];  // Lấy tên tác giả từ kết quả truy vấn
    // Cập nhật thông tin tác giả
    $update_tg_sql = "UPDATE tac_gia SET hoten='$tentg' WHERE matg='$matg'";
    $conn->query($update_tg_sql);
}

// Cập nhật thông tin thể loại
$sql_tl = "SELECT tentl FROM the_loai WHERE matl='$matl'";
$result_tl = $conn->query($sql_tl);
if ($result_tl->num_rows > 0) {
    $theloai_row = $result_tl->fetch_assoc();
    $tentl = $theloai_row['tentl'];  // Lấy tên thể loại từ kết quả truy vấn
    // Cập nhật thông tin thể loại
    $update_tl_sql = "UPDATE the_loai SET tentl='$tentl' WHERE matl='$matl'";
    $conn->query($update_tl_sql);
}

    // Cập nhật thông tin giá
    $update_dgia_sql = "UPDATE don_gia SET dongia='$dongia' WHERE masach='$masach'";
    $conn->query($update_dgia_sql);

    // Cập nhật thông tin kỹ thuật
    $update_ttkt_sql = "UPDATE thong_tin_ky_thuat SET kichthuoc='$kichthuoc', sotrang='$sotrang', loaibia='$loaibia' WHERE masach='$masach'";
    $conn->query($update_ttkt_sql);

    // Chuyển hướng lại trang chi tiết sản phẩm sau khi sửa
    header("Location: view_product.php?id=$masach");
    exit;
}

// Lấy danh sách tác giả và thể loại
$tacgia_sql = "SELECT matg, hoten FROM tac_gia";
$tacgia_result = $conn->query($tacgia_sql);
// print_r($tacgia_result); // In ra toàn bộ mảng
$theloai_sql = "SELECT matl, tentl FROM the_loai";
$theloai_result = $conn->query($theloai_sql);

$conn->close();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin sách</title>
    <link rel="stylesheet" href="edit_product.css">
</head>
<body>
    <div class="container">
        <h2>Sửa thông tin sản phẩm</h2>

        <form action="edit_product.php?id=<?php echo $masach; ?>" method="POST">
            <div class="form-group">
                <label for="tensach">Tên sách:</label>
                <input type="text" id="tensach" name="tensach" value="<?php echo $tensach; ?>" required>
            </div>

            
            <div class="form-group">
    <label for="matg">Tác giả:</label>
    <select id="matg" name="matg" required>
        <?php while ($tacgia_row = $tacgia_result->fetch_assoc()) { ?>
            <option value="<?php echo $tacgia_row['matg']; ?>" 
                <?php echo ($hoten_tacgia == $tacgia_row['hoten']) ? 'selected' : ''; ?>>
                <?php echo $tacgia_row['hoten']; ?>
            </option>
        <?php } ?>
    </select>
</div>


            <div class="form-group">
                <label for="matl">Thể loại:</label>
                <select id="matl" name="matl" required>
                    <?php while ($theloai_row = $theloai_result->fetch_assoc()) { ?>
                        <option value="<?php echo $theloai_row['matl']; ?>" <?php echo ($tentl == $theloai_row['tentl']) ? 'selected' : ''; ?>>
                            <?php echo $theloai_row['tentl']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="dongia">Giá:</label>
                <input type="number" id="dongia" name="dongia" value="<?php echo $dongia; ?>" required>
            </div>
            <?php
            if ($dongia != $row['dongia']) {
                $thoidiem = date('Y-m-d');  // Set to current date if price changes
            } else {
                $thoidiem = null;  // No change in date if price remains the same
            }
            if ($thoidiem !== null) {
        $update_thoidiem_sql = "UPDATE don_gia SET thoidiem='$thoidiem' WHERE masach='$masach'";
        $conn->query($update_thoidiem_sql);
}

            ?>

<!-- 
            <div class="form-group">
    <label for="thoidiem">Thời điểm bán:</label>
    <input type="date" id="thoidiem" name="thoidiem" value="<?php echo !empty($thoidiem) ? $thoidiem : date('Y-m-d'); ?>" required>
</div> -->

            <div class="form-group">
                <label for="kichthuoc">Kích thước:</label>
                <input type="text" id="kichthuoc" name="kichthuoc" value="<?php echo $kichthuoc; ?>" required>
            </div>

            <div class="form-group">
                <label for="sotrang">Số trang:</label>
                <input type="number" id="sotrang" name="sotrang" value="<?php echo $sotrang; ?>" required>
            </div>

            <div class="form-group">
                <label for="loaibia">Loại bìa:</label>
                <input type="text" id="loaibia" name="loaibia" value="<?php echo $loaibia; ?>" required>
            </div>
            <div class="form-group">
                <label for="mota">Mô tả:</label>
                <textarea id="mota" name="mota" ><?php echo $mota; ?></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-submit">Lưu thay đổi</button>
            </div>
           

        </form>
    </div>
    <script>

</script>
</body>
</html>
