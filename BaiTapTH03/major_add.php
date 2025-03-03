
<?php
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

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $id = $_POST['id'];
    $name_major = $_POST['name_major'];

    // Insert the data into the database
    $sql = "INSERT INTO major (id, name_major) VALUES ('" . $id . "', '" . $name_major . "')";

    // Execute the query and check for success
    if ($conn->query($sql) === TRUE) {
        echo "Thêm chuyên ngành thành công!";
        header('Location: major_index.php');
        exit(); 
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE HTML>
<html>
    <style>
        form input {
            margin-top: 10px;
        }
    </style>
<body>
    <h1>Form nhập dữ liệu chuyên ngành</h1>
    <!-- Display the form for adding new major -->
    <form action="" method="post">
        ID: <input type="text" name="id" required><br>
        Major: <input type="text" name="name_major" class="name_major" required><br>
        <input type="submit" value="Thêm mới">
    </form>
</body>
</html>
