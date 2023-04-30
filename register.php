<?php
error_reporting(1);
// header infos of service page
$link = "register.php";
$display = "block";
$title = "Register";
$head_con = "hero_area sub_pages";
include('includes/header.php');
echo "</div>";
// end 

// get link 
$link = $_GET['link'];
if(isset($_POST['register'])) {
    if($_POST['captch']==$_POST['hid']) {
        include('includes/connection.php');
        $error = "";
        $success = "";
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $ph = $_POST['phone'];
        $adr = $_POST['adr'];

        $oldEmail = mysqli_query($connect, "SELECT * FROM register WHERE email = '$email'");
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)){
            $error = "Only letters and whitespaces are allow."; 
        // }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        //     $error = "Invalid email.";
        }elseif (mysqli_num_rows($oldEmail) > 0){
            $error = "Your email had been existed! Try another.";
        }else{
            $query = "INSERT INTO register VALUES('','$name','$email','$pass','$ph','$adr','',now())";
            $insert = mysqli_query($connect, $query);
            $success = "Registering success!";
            session_start();
            $_SESSION['user_email'] = $email;
            header('location: '.$link.'');
        }
    }
    else {
        $error = "Wrong captcha! Try again.";
    }
}
?>

      <section id="form_content">  
        <div id="regf-con" class="container mt-3">
            <form action="" method="post" id="reg-form">
            <center>
                <div id="reg-head">
                    <h3>Register Now</h3>
                </div>
                <div class="mt-2">
                    <input type="text" name="name" placeholder="Name" id="name" required>
                </div><br>
                <div>
                    <input type="email" name="email" placeholder="Email" id="email" required>
                </div><br>
                <div>
                    <input type="password" name="pass" placeholder="Password" id="pass" required>
                </div><br>
                <div>
                    <input type="text" name="phone" placeholder="Phone" id="ph" required>
                </div><br>
                <div>
                    <input type="text" name="adr" placeholder="Address" id="adr" required>
                </div>

                <div class="mt-2">
                    <table align="left" class="ml-3">
                        <tr>
                            <td>Validation code: </td>
                            <td>
<?php
$arr= array_merge(range(0,9),range("A","Z"));
//print_r($arr);
for($i=1;$i<=5;$i++)
{
$ch = $arr[array_rand($arr)];
@$captcha=$captcha.$ch;
@$fc=$fc.$ch.",";
}
//echo $fc."<br>";
$nar = explode(",",$fc);
for($i=0;$i<5;$i++)
{
// echo $nar[$i];
echo "<img src='captch_img/$nar[$i].png' width='23px'/>";
}
echo "<input type='hidden' value='$captcha' name='hid'/>";
?>
                            </td>
                        </tr>
                    </table>
                </div><br>
                <div>
                    <input type="text" name="captch" placeholder="Enter validation code here" id="captch" required>
                </div>
                <div class="mt-2">
                    <font color="red"><?php echo $error; ?></font>
                    <font color="green"><?php echo $success; ?></font>
                </div><br>
                <div>
                    <button type="submit" name="register" id="reg-btn">
                    Register
                    </button>
                </div>
                </center>
                <div class="mt-3 ml-md-4 ml-2">
                    <p>Already have an account &nbsp;<a href="login.php">login.</a></p>
                </div>
            </form>
        </div>
      </section>

<?php
include('includes/footer.php');
?>