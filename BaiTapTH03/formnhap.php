<!DOCTYPE HTML>
<html>
    <style>
        form input {
            margin-top: 10px;
        }
        .email {
            width: 250px;
        }
    </style>
<body>
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

// Truy vấn lấy tất cả chuyên ngành từ bảng major
$sql = "SELECT id, name_major FROM major";
$result = $conn->query($sql);
?>
<form action="luu.php" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email" class="email"><br>
Birthday: <input type="date" name="birth"><br>
    Major: 
    <select name="major_id" style="margin: 10px 10px;" >
        <option value="">Chọn chuyên ngành</option>
        <?php
        // Hiển thị danh sách các chuyên ngành từ cơ sở dữ liệu
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["id"] . "'>" . $row["name_major"] . "</option>";
            }
        } else {
            echo "<option value=''>Không có chuyên ngành</option>";
        }
        ?>
    </select><br>

<input type="submit">
</form>
</body>
</html>