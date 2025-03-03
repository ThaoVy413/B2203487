<!-- <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsv";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$date = date_create($_POST["birth"]);
$sql = "INSERT INTO student (fullname, email, birthday, major_id) VALUES

('".$_POST["name"] ."', '".$_POST["email"] ."', '".$date ->format('Y-m-d') ."',' ".$_POST["major_id"] ."')";

if ($conn->query($sql) === TRUE) {
echo "Them sinh vien thanh cong";
//neu thuc hien thanh cong, chung ta se cho di chuyen den
//taidulieu_bang.php
header('Location: taidulieu_bang.php');
} else {
echo "Error: " . $sql . "<br>" . $conn->error;

}
$conn->close();
?> -->
<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsv";
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$name = $_POST['name'];
$email = $_POST['email'];
$birth = $_POST['birth'];
$major_id = $_POST['major_id'];

// Kiểm tra xem các trường có rỗng hay không
if (empty($name) || empty($email) || empty($birth) || empty($major_id)) {
    die("Vui lòng điền đầy đủ thông tin!");
}

// Truy vấn để lưu thông tin sinh viên vào bảng student
$sql = "INSERT INTO student (fullname, email, birthday, major_id) 
        VALUES ('$name', '$email', '$birth', '$major_id')";

// Thực thi câu lệnh
if ($conn->query($sql) === TRUE) {
    echo "Sinh viên đã được thêm thành công!";
    // Chuyển hướng về trang danh sách sinh viên hoặc trang chính
    header("Location: taidulieu_bang1.php"); // Hoặc tên trang danh sách sinh viên của bạn
    exit();
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

