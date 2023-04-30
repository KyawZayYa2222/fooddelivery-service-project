<?php
error_reporting(1);
include('includes/connection.php');
// for checking source data to delete
$source = $_GET['source'];
$id = $_GET['id']; 

// deleting data 
$delete = mysqli_query($connect, "DELETE FROM $source WHERE id='$id'");
header('location: '.$source.'.php?back=del');
?>