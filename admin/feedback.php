<?php
error_reporting(1);
session_start();
if($_SESSION['name']=="" && $_SESSION['pass']==""){
    header('location: login.php');
}
else{
    $title = "Feedback View";
    $feedback = "background-color: white; color: black;";
    include('includes/header.php');
?>

            <div class="col-md-10 col-sm-9" id="admin_content">
                <div id="content_head">
                    <nav>
                        <img src="img/logo02.png" alt="logo" width="75px">
                    </nav>
                    <h3 style="text-align:center">Feedbacks View</h3>
                </div><hr>
                <div class="container">
    
<?php
if(isset($_GET['back'])=="del"){
    echo "<font color='red' align='center'><h5>You deleted a feedback.</h5></font>";
}
include('includes/connection.php');
$data = mysqli_query($connect, "SELECT * FROM feedback order by id DESC");
if(mysqli_num_rows($data) > 0) {
    echo "<table id='prod_tb' class='table fs16'>
        <tr id='ptb_head'>
        <th width='5%'>No.</th>
        <th width='10%'>Name</th>
        <th width='20%'>Email</th>
        <th width='50%'>Message</th>
        <th width='15%'>Action</th>
        </tr>";
    // for No. 
    $i = 0;
    while(list($id,$name,$email,$img,$mess) = mysqli_fetch_array($data)){
        $i++;
        echo    "<tr>
                <td>".$i."</td>
                <td>".$name."</td>
                <td>".$email."</td>
                <td>".$mess."</td>
                <td><a href='delete.php?source=feedback&&id=".$id."' class='btn btn-sm btn-danger'>Delete</a></td>";
        echo    "</tr>";
    }
    echo "</table>";
}
else {
    echo "<p align='center'>No feedbacks have been yet!</p>";
}
?>

            </div>
            </div>

<?php
include('includes/footer.php');
 }
 ?>