<?php
error_reporting(1);
// header infos of feedback page
$link = "feedback.php";
$display = "block";
$title = "Feedback";
$head_con = "hero_area sub_pages";
include('includes/header.php');
echo "</div>";
// end 
include('includes/connection.php');

// for form auto value
$name = "";
$email = "";
// for alert message 
$alert ="Give your feedback here.";

session_start();
$email = $_SESSION['user_email'];
$query = mysqli_query($connect, "SELECT * FROM register where email='$email'");
while($rows = mysqli_fetch_assoc($query)){
    $name = $rows['name'];
    $img = $rows['image'];
}
// for checking email existed // feedback can write for only one time 
$data = mysqli_query($connect, "SELECT * FROM feedback where email='$email'");

if(isset($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mess = $_POST['message'];

    if($_SESSION['user_email'] == ""){
        header('location: login.php?link=feedback.php');
    }
    elseif($name=="" || $email=="" || $mess==""){
        $alert = "Please fill all fields";
        $color = "red";
    }
    elseif(mysqli_num_rows($data) > 0){
        $alert = "You are have been feedback for one time.";
    }
    else{
        $insert = mysqli_query($connect, "INSERT INTO feedback value('','$name','$email','$img','$mess')");
        $alert = "Thanks for your feedback.";
        $color = "green";
    }
}
?>

<div id="bg_white">
<div class="container pt-3">
    <!-- feedback form  -->
    <div class="row mt-3" align="center">
        <div class="col" id="feedback">
            <div class="ml-4 mb-2">
                    <h2 class="custom_heading">feedback form</h2>
                    <p><font color="<?php echo $color; ?>"><?php echo $alert; ?></font></p>
            </div>
            <form action="" method="post">
                <input type="text" name="name" class="mb-2" placeholder="Name" value="<?php echo $name; ?>"><br>
                <input type="email" name="email" class="mb-2" placeholder="Email" value="<?php echo $email; ?>"><br>
                <textarea name="message" class="mb-2" cols="40" rows="7" placeholder="Message"></textarea><br>
                <button type="submit" name="send" id="fbsend_btn" class="orange-btn">SEND</button>
            </form>
        </div>
        <div class="col mt-2">
            <div id="fbimg_con">
                <img src="template_img/sweetfood_bg.png" alt="img">
            </div>
        </div>
    </div><hr>
    <!-- end  -->
    
    <!-- feedbacks showing section  -->
    <div class="mt-4" align="center">
        <h1 class="custom_heading">Feedbacks</h1>
        <p>Here, some of feedbacks of our customers</p>
    </div>
    <div class="row mt-2">
<?php
$query = mysqli_query($connect, "SELECT * FROM feedback order by rand()");
    for($i=0; $i<3; $i++){
        list($id,$name,$email,$img,$mess) = mysqli_fetch_array($query);
        echo    "<div class='col' align='center'>
                <div class='card mb-4' id='fb_card'>
                    <div class='card-head mt-2' align='center'>
                        <div id='card_img'>
                            <img src='user_img/".$email."/".$img."' alt='img' width='150px'>
                        </div>
                        <h4>".$name."</h4>
                    </div>
                    <div class='card-body' id='card_body'>
                        <p>".$mess."</p>
                    </div>
                </div>
            </div>";
    }
?>
    </div>
</div>
</div>

<?php
include('includes/footer.php');
?>