<?php
error_reporting(1);
include('includes/connection.php');

    $data = mysqli_query($connect, "SELECT * FROM product WHERE pname LIKE '%".$_POST['data']."%'");
    echo "<table>";
    echo "<tr><td><button id='close'>+</button></td></tr>";
    if(mysqli_num_rows($data)>0){
        while($rows = mysqli_fetch_assoc($data)){
            echo "<tr>";
            echo "<td width='30%'><img src='admin/product_img/".$rows['image']."' alt='img' width='50px'></td>";
            echo "<td width='70%'><a href='order_page.php?id=".$rows['id']."' style='color: black'>".$rows['pname']."</a></td>";
            echo "</tr>";
        }
    }
    else{
        echo "<tr><td>No result found ..</td></tr>";
    }
    echo "</table>";

?>
