<?php
error_reporting(1);
session_start();
if($_SESSION['name']=="" && $_SESSION['pass']==""){
    header('location: login.php');
}
else{
    $title = "Order View";
    $order = "background-color: white; color: black;";
    include('includes/header.php');
?>

            <div class="col-md-10 col-sm-9" id="admin_content">
                <div id="content_head">
                    <nav>
                        <img src="img/logo02.png" alt="logo" width="75px">
                    </nav>
                    <h3 style="text-align:center">Order View</h3>
                </div><hr>
                <div class="container">
<?php
include('includes/connection.php');
$data = mysqli_query($connect, "SELECT * FROM orderdb order by id DESC");
if(mysqli_num_rows($data) > 0) {
    echo "<table id='prod_tb' class='table fs16'>
        <tr id='ptb_head'>
        <th width='5%'>No.</th>
        <th width='10%'>Name</th>
        <th width='10%'>Phone</th>
        <th width='20%'>Address</th>
        <th width='15%'>Product</th>
        <th width='10%'>Price</th>
        <th width='5%'>Number</th>
        <th width='10%'>OrderId</th>
        <th width='15%'>Confirm</th>
        </tr>";
    // for No. 
    $i = 0;
    while(list($id,$name,$ph,$adr,$pro,$price,$num,$ordId,$ordConfirm) = mysqli_fetch_array($data)){
        $i++;
        echo    "<tr>
                <td>".$i."</td>
                <td>".$name."</td>
                <td>".$ph."</td>
                <td>".$adr."</td>
                <td>".$pro."</td>
                <td>".$price."</td>
                <td>".$num."</td>
                <td>".$ordId."</td>
                <td>";
                if($ordConfirm == "Yes"){
                    echo "Confirmed";
                }
                if($ordConfirm == "No"){
                    echo "<a class='btn btn-sm btn-primary' href='ord_confirm.php?id=".$id."'>Confirm</a>";
                }
        echo    "</td></tr>";
    }
    echo "</table>";
}
?>

            </div>
            </div>

<?php
include('includes/footer.php'); 
}
?>