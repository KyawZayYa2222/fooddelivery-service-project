<?php
error_reporting(1);
include('includes/connection.php');
if(isset($_REQUEST['order'])){
    $name = $_REQUEST['name'];
    $ph = $_REQUEST['phone'];
    $adr = $_REQUEST['address'];
    $product = $_REQUEST['pname'];
    $price = $_REQUEST['price'];
    $pnum = intval($_REQUEST['num']);
    // for unique rand order id 
    $range = range('A', 'Z');
    $rand = array_rand($range);
    $orderid = "ord".rand(1, 999).$range[$rand];
    $order_confirm = "No";
    // end ///
    
    // echo $name."<br>".$phone."<br>".$adr."<br>".$product."<br>".$pnum;
    $data = mysqli_query($connect, "SELECT * FROM product where pname='$product'");
    if(mysqli_num_rows($data)>0) {
        $query="INSERT INTO orderdb
        VALUES ('', '$name','$ph','$adr','$product','$price','$pnum','$orderid','$order_confirm')";
        mysqli_query($connect, $query);
        if(empty($page)){
            header('location: menu.php');
        }
        else{
            header('location: menu.php?page='.$page.'');
        }
    }
}