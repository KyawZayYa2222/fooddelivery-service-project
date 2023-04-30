<!-- user logout php for only user  -->
<?php
error_reporting(1);
session_start();
unset($_SESSION['user_email']);
header('location: index.php');
?>