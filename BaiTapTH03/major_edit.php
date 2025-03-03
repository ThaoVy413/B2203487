
<!DOCTYPE HTML>
<html>
    <style>
        form input {
            margin-top: 10px;
        }
    </style>
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

// Get the ID from the POST request
$id = $_POST['id'];  // Get ID from the form submission
$sql = "SELECT * FROM major WHERE id='" . $id . "'";  
$result = $conn->query($sql);
$row = $result->fetch_assoc();  
?>
<body>
    
    <?php print_r($row); ?>

    <form action="major_edit_save.php" method="post">
        <!-- Hidden input to pass the ID -->
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        
        ID: <input type="text" name="id" value="<?php echo $row['id']; ?>" disabled><br>  <!-- Display ID, disabled -->
        Major: <input type="text" name="name_major" value="<?php echo $row['name_major']; ?>"><br>  <!-- Editable major name -->

        <input type="submit" value="Gửi">
    </form>

</body>
</html>
