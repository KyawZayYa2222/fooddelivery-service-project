<?php
error_reporting(1);
// $link = "login.php";
$display = "block";
$title = "Login";
include('includes/header.php');
include('includes/connection.php');
// get link
$link = $_GET['link'];
if(isset($_POST['login'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $check = mysqli_query($connect, "SELECT * FROM register where name='$name' and email='$email' and password='$pass'");
    if(mysqli_num_rows($check) > 0){
        session_start();
        $_SESSION['user_email'] = $email;
        header('location: '.$link.'');
    }
    else{
        $error = "Something went wrong! Please try again.";
    }
}
?>

    <section id="form_content">
        <div id="regf-con" class="container mt-5">
            <form method="post" id="reg-form">
            <center>
                <div id="reg-head">
                    <h3>Login</h3>
                </div>
                <div class="mt-2">
                    <input type="text" name="name" placeholder="Name" id="name" autocomplete="off" required>
                </div><br>
                <div>
                    <input type="email" name="email" placeholder="Email" id="email" autocomplete="off" required>
                </div><br>
                <div>
                    <input type="password" name="pass" placeholder="Password" id="pass" autocomplete="off" required>
                </div>
                <div class="mt-2">
                    <font color="red"><?php echo $error; ?></font>
                </div>
                <div>
                    <button type="submit" name="login" id="reg-btn">
                    Login
                    </button>
                </div>
                </center>
                <div class="mt-3 ml-md-4 ml-2">
                    <p>If you dont't have an account &nbsp;<a href="register.php?link=<?php echo $link; ?>">register.</a></p>
                </div>
            </form>
        </div>
    </section>

<?php
include('includes/footer.php');
?>