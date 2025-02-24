<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanhang";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
//   $email = $_POST['email'];
//  $password=$_POST['pass'];
//  $sql = "SELECT * FROM customers WHERE email = ".$email." and password = ".$password." " ; //Injection "="
 //$sql = "select * FROM customers WHERE email = '".$email."'"; //Injection "1=1"
// $sql = "SELECT * FROM customers WHERE email = ".$email." and password = " .$password." " ;
$sql = "select fullname, email from customers where email = '".$_POST["email"]."' and
 password = '".md5($_POST["pass"])."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    //Su dung cookie
    // $cookie_name = "user";
    // $cookie_value = $row['email'] ;
    // setcookie($cookie_name, $cookie_value, time() + (86400 / 24), "/");
    // setcookie("fullname", $row['fullname'], time() + (86400 / 24), "/");
    // setcookie("id", $row['id'], time() + (86400 / 24), "/");

    // Bắt đầu session
// Lưu trữ dữ liệu vào session
session_start();
$_SESSION['fullname'] = $row['fullname'];
$_SESSION['user'] = $row['email'];

    //header('Location: homepage.php');
    //header('Location: sua_mk.php');
    echo "Da dang nhap bang email: " .$row['email'];
    echo "<br>";
    echo "FullName: " .$row['fullname'];
    echo "<br>";
    echo "Password: " .md5($_POST["pass"]);
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>