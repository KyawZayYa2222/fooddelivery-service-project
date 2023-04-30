<?php
error_reporting(1);
session_start();
if($_SESSION['name']=="" && $_SESSION['pass']==""){
    header('location: login.php');
}
else{
    $title = "Contact View";
    $contact = "background-color: white; color: black;";
    include('includes/header.php');
?>
            <div class="col-md-10 col-sm-9" id="admin_content">
                <div id="content_head">
                    <nav>
                        <img src="img/logo02.png" alt="logo" width="75px">
                    </nav>
                    <h3 style="text-align:center">Contact View</h3>
                </div><hr>
                <div class="container">

<?php
include('includes/connection.php');
$query = mysqli_query($connect, "SELECT * FROM contact");
if(mysqli_num_rows($query)>0){
    echo "<table id='prod_tb' class='table fs16'>
        <tr id='ptb_head'>
        <th width='5%'>No.</th>
        <th width='15%'>Name</th>
        <th width='10%'>Email</th>
        <th width='20%'>Email</th>
        <th width='40%'>Message</th>
        <th width='10%'>Action</th>
        </tr>";
        $i = 0;
    while($row = mysqli_fetch_assoc($query)){
        $i++;
        $id  = $row['id'];
        echo    "<tr>
                <td>".$i."</td>
                <td>".$row['name']."</td>
                <td>".$row['ph']."</td>
                <td>".$row['email']."</td>
                <td>".$row['message']."</td>
                <td>";
                if(isset($_POST['reply'.$id.''])){
                    mysqli_query($connect, "UPDATE contact SET action='Yes' where id='$id'");
                }
                if($row['action'] == "Yes"){
                    echo "Replied";
                }
                if($row['action'] == "No"){
                    echo "<form method='post'><button type='submit' name='reply".$id."' class='btn btn-sm btn-danger'>Reply</button></form>";
                }
        echo    "</td></tr>";
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