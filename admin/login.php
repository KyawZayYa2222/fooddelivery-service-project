<?php
error_reporting(1);
session_start();
include('includes/connection.php');

if(isset($_POST['login'])){
    $error = "";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $olddata = mysqli_query($connect, "SELECT * FROM admin where name = '$name' 
                and email = '$email' and password = '$pass'");
    if(mysqli_num_rows($olddata) > 0){
        $_SESSION['name'] = $name;
        $_SESSION['pass'] = $pass;
        header('location: index.php');
    }
    else{
        $error = "Something went wrong!Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin login</title>
    <link href="css/style.css" rel="stylesheet" />
</head>
<body>
    <center>
        <div id="form_con">
            <form action="" method="post">
                <table>
                    <tr>
                        <img src="img/logo02.png" alt="q&f" style="padding-bottom: 20px; width: 75px;">
                    </tr>
                    <tr>
                        <h2 style="color: #e9502a;">Login</h2>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="name" id="name" required></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" id="email" required></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="pass" id="pass" required></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="login" value="Login" id="login">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <font color="red">
                                <?php echo $error; ?>
                            </font>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </center>
</body>
</html>