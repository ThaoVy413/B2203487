<?php
// upload-csv-processing.php
$servername = "localhost";
$username = "root"; // Thay đổi theo thông tin của bạn
$password = "";
$dbname = "qlbanhang";

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kiểm tra nếu có file được upload
if (isset($_POST['submit']) && isset($_FILES['csvfile'])) {
    $file = $_FILES['csvfile'];
   
    // Kiểm tra loại tệp (chỉ chấp nhận CSV)
    if ($file['type'] == 'text/csv' || pathinfo($file['name'], PATHINFO_EXTENSION) == 'csv') {
        // Đọc nội dung file CSV
        $filename = $file['tmp_name'];
        $file_open = fopen($filename, "r");

        // Đọc qua từng dòng và chèn vào CSDL
        //fgetcsv($file_open); // Bỏ qua dòng đầu tiên (header)
        while (($data = fgetcsv($file_open, 1000, ",")) !== FALSE) {
            // Lấy các giá trị từ dòng CSV
            $id = $data[0];
            $fullname = $data[1];
            $email = $data[2];
            $birthday = $data[3];
            $password = md5($data[4]);

            // Chèn dữ liệu vào bảng customers
            $sql = "INSERT INTO customers (id, fullname, email, Birthday, password)
                    VALUES ('$id', '$fullname', '$email', '$birthday', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo "Ban ghi $fullname duoc tao thanh cong !<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        
        fclose($file_open);
    } else {
        echo "Upload file CSV.";
    }
}

$conn->close();
?>
