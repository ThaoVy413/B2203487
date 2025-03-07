<?php
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

// Kiểm tra nếu có tham số 'id' trong URL
if (isset($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    $masach = $_GET['id'];  // Lấy mã sách từ URL
     // Tắt kiểm tra khóa ngoại
     $conn->query("SET FOREIGN_KEY_CHECKS = 0");

    // Thực hiện xóa thông tin trong bảng THONG_TIN_KY_THUAT
    $sql_ttkt = "DELETE FROM THONG_TIN_KY_THUAT WHERE MaSach = ?";
    $stmt_ttkt = $conn->prepare($sql_ttkt);
    $stmt_ttkt->bind_param("s", $masach);
    if ($stmt_ttkt->execute() !== TRUE) {
        echo "Lỗi khi xóa thông tin kỹ thuật: " . $conn->error;
        exit();
    }

    // // Xóa chi tiết phiếu nhập
    // $sql_ttpn = "DELETE FROM chi_tiet_phieu_nhap WHERE MaSach = ?";
    // $stmt_ttpn = $conn->prepare($sql_ttpn);
    // $stmt_ttpn->bind_param("s", $masach);
    // if ($stmt_ttpn->execute() !== TRUE) {
    //     echo "Lỗi khi xóa chi tiết phiếu nhập: " . $conn->error;
    //     exit();
    // }

    // // Bước 1: Xóa chi tiết phiếu xuất
    // $sql_ttpx = "DELETE FROM CHI_TIET_PHIEU_XUAT WHERE MaSach = ?";
    // $stmt_ttpx = $conn->prepare($sql_ttpx);
    // if ($stmt_ttpx === false) {
    //     die("Lỗi khi chuẩn bị câu lệnh SQL: " . $conn->error);
    // }
    // $stmt_ttpx->bind_param("s", $masach);
    // if ($stmt_ttpx->execute() !== TRUE) {
    //     echo "Lỗi khi xóa chi tiết phiếu xuất: " . $conn->error;
    //     exit();
    // }

    // // Bước 2: Xóa phiếu xuất không còn chi tiết
    // $sql_pxu = "DELETE FROM PHIEU_XUAT WHERE MaPX NOT IN (SELECT MaPX FROM CHI_TIET_PHIEU_XUAT)";
    // if ($conn->query($sql_pxu) === TRUE) {
    //     echo "Xóa phiếu xuất thành công.";
    // } else {
    //     echo "Lỗi khi xóa phiếu xuất: " . $conn->error;
    // }
    // $sql = "DELETE FROM DANH_GIA WHERE MaSach = ?";
    
    // // Chuẩn bị câu lệnh SQL
    // $stmt = $conn->prepare($sql);
    // if ($stmt === false) {
    //     echo "Lỗi khi chuẩn bị câu lệnh: " . $conn->error;
    //     exit();
    // }

    // // Liên kết tham số và thực thi câu lệnh
    // $stmt->bind_param("s", $masach);  // 's' cho kiểu string
    // $stmt->execute();


    // // Bước 1: Xóa chi tiết phiếu xuất
    // $sql_ttdh = "DELETE FROM CHI_TIET_DON_HANG WHERE MaSach = ?";
    // $stmt_ttdh = $conn->prepare($sql_ttdh);
    // if ($stmt_ttdh === false) {
    //     die("Lỗi khi chuẩn bị câu lệnh SQL: " . $conn->error);
    // }
    // $stmt_ttdh->bind_param("s", $masach);
    // if ($stmt_ttdh->execute() !== TRUE) {
    //     echo "Lỗi khi xóa chi tiết phiếu xuất: " . $conn->error;
    //     exit();
    // }

    // // Bước 2: Xóa phiếu xuất không còn chi tiết
    // $sql_dh = "DELETE FROM Don_hang WHERE MaDH NOT IN (SELECT MaDH FROM CHI_TIET_DON_HANG)";
    // if ($conn->query($sql_dh) === TRUE) {
    //     echo "Xóa đơn hàng thành công.";
    // } else {
    //     echo "Lỗi khi xóa đơn hàng: " . $conn->error;
    // }

    $sql_dongia = "DELETE FROM DON_GIA WHERE MaSach = ?";
    $stmt_DONGIA = $conn->prepare($sql_dongia);
    $stmt_DONGIA->bind_param("s", $masach);
    if ($stmt_DONGIA->execute() !== TRUE) {
        echo "Lỗi khi xóa thông tin don gia: " . $conn->error;
        exit();
    }

    // Thực hiện xóa sách trong bảng SACH
    $sql_sach = "DELETE FROM SACH WHERE MaSach = ?";
    $stmt_sach = $conn->prepare($sql_sach);
    $stmt_sach->bind_param("s", $masach);  // Liên kết tham số (s - string)
    if ($stmt_sach->execute() === TRUE) {
        // Bật lại kiểm tra khóa ngoại
    $conn->query("SET FOREIGN_KEY_CHECKS = 1");
        // Chuyển hướng về trang danh sách sản phẩm sau khi xóa thành công
        header("Location: products.php");
        exit();
    } else {
        echo "Lỗi khi xóa sách: " . $conn->error;
    }
     
    // Đóng statement
    $stmt_ttkt->close();
    // $stmt_ttpn->close();
    // $stmt_ttpx->close();
    $stmt_DONGIA->close();
    $stmt_sach->close();
} else {
    echo "<script type='text/javascript'>
    if (confirm('Bạn có chắc chắn muốn xóa sách $_GET[id].')) {
        window.location.href = 'delete_product.php?id=" . $_GET['id'] . "&confirm=yes';
    } else {
        window.location.href = 'products.php';
    }
  </script>";
}


// Đóng kết nối
$conn->close();
?>
