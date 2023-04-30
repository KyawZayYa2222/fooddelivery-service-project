<?php
error_reporting(1);
session_start();
if($_SESSION['name']=="" && $_SESSION['pass']==""){
    header('location: login.php');
}
else{
    $title = "Admin Dashboard";
    $dashboard = "background-color: white; color: black;";
    include('includes/header.php');
    include('includes/connection.php');

    // get number of db row
    function getnumber($connect,$tb){
        $query = mysqli_query($connect, "SELECT * FROM $tb");
        echo mysqli_num_rows($query);
    }
    
?>

            <div class="col-md-10 col-sm-9" id="admin_content">
                <div id="content_head">
                    <nav>
                        <img src="img/logo02.png" alt="logo" width="75px">
                    </nav>
                    <h3 style="text-align:center">Dashboard Overview</h3>
                </div><hr>
                <div class="container">
                    <div class="row">
                        <div class="col mt-3">
                            <div class="board" id="product">
                                <div id="text_con">
                                    <h2>Products</h2>
                                    <h1><?php getnumber($connect,"product"); ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col mt-3">
                            <div class="board" id="order">
                                <div id="text_con">
                                    <h2>Orders</h2>
                                    <h1><?php getnumber($connect,"orderdb"); ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col mt-3">
                            <div class="board" id="register">
                                <div id="text_con">
                                    <h2>Registers</h2>
                                    <h1><?php getnumber($connect,"register"); ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col mt-3">
                            <div class="board" id="feedback">
                                <div id="text_con">
                                    <h2>Feedbacks</h2>
                                    <h1><?php getnumber($connect,"feedback"); ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col mt-3">
                            <div class="board" id="subscriber">
                                <div id="text_con">
                                    <h2>Subscribers</h2>
                                    <h1><?php getnumber($connect,"subscribers"); ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col mt-3">
                            <div class="board" id="contact">
                                <div id="text_con">
                                    <h2>Contacts</h2>
                                    <h1><?php getnumber($connect,"contact"); ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col mt-3 mb-3">
                            <div id="calendar">
                                <?php include('includes/calendar.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php 
include('includes/footer.php');
}
?>