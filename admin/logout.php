<!-- admin user logout php for only user  -->
<?php
error_reporting(1);
session_start();
unset($_SESSION['name']);
unset($_SESSION['pass']);
header('location: login.php');
?>