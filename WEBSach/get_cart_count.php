<?php
session_start();
$count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
echo $count;
?>
