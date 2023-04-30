<?php
error_reporting(1);
include('includes/connection.php');
$id = $_GET['id'];
// echo $id;
$query = mysqli_query($connect, "UPDATE orderdb SET orderConfirm='Yes' where id='$id'");
header('location: order.php');
?>