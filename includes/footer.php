<?php
include_once('includes/connection.php');
if(isset($_POST['subscribe'])){
  $email = $_POST['email'];
  $check = mysqli_query($connect, "SELECT * FROM subscribers where email='$email'");
  if(mysqli_num_rows($check)>0){
    $value = "You subscribed";
  }
  else{
    $query = mysqli_query($connect, "INSERT INTO subscribers values('', '$email')");

    // send mail to subscriber for subscribe confirming
    $from = "kyawzayya3706@ojtstudent.com";
    // $to = "kyawzayya100417@gmail.com";
    $subject = "Quick Food food service website";
    $headers = array(
    "Mine-Version" => "1.1",
    "Content-Type" => "text/html;charset=UTF-8",
    "From" => $from
    );
    $body = "<html>
<head>
  <style>
    .con{
      padding: 20px 10px 20px 10px;
      border: 5px;
      background-color: #e8e8e8;
    }
  </style>
</head>
<body>
  <div class='con' align='center'>
    <h1>Thank For Subscribe!</h1>
    <h2>We will alert you when new products come. enjoy!</h2>
  </div>
</body>
</html>"; 
  mail($email,$subject,$body,$headers);
  }
  // echo "success";
}
?>
<!-- footer sesction  -->
<section class="info_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h5>Related</h5>
          <ul>
            <li><a class="black" href="index.php">Home</a></li>
            <li><a class="black" href="menu.php">Menu</a></li>
            <li><a class="black" href="service.php">Services</a></li>
            <li><a class="black" href="feedback.php">Feedbacks</a></li>
            <li><a class="black" href="profile.php">Profile</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>Services</h5>
          <ul>
            <li><a class="black" href="service.php">Fresh Ingredients</a></li>
            <li><a class="black" href="service.php">Delicious Menus</a></li>
            <li><a class="black" href="service.php">Fast Delivery</a></a></li>
          </ul>
        </div>
        <div class="col-md-3">
        <div class="social_container">
          <h5>Register Now</h5>
          <a href="register.php" class="black">register</a>
            <h5>Follow Us</h5>
            <div class="social-box">
              <a href="">
                <img src="template_img/fb.png" alt="">
              </a>
              <a href="">
                <img src="template_img/twitter.png" alt="">
              </a>
              <a href="">
                <img src="template_img/linkedin.png" alt="">
              </a>
              <a href="">
                <img src="template_img/instagram.png" alt="">
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="subscribe_container">
            <h5>
              Subscribe Now
            </h5>
            <div class="form_container">
              <form action="" method="post">
              <?php echo $value; ?>
                <input type='email' name='email' placeholder='Enter Email' required>
                <button type='submit' name='subscribe'>Subscribe</button>
      
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      Copyright &copy; 2021- <?php echo date("Y"); ?>
      Food Service Website developed by KyawZayYa.
    </p>
  </section>
  <!-- footer section -->
  
  <!-- scripts  -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- <script src="js/custom-jquery.js"></script> -->
  <script type="text/javascript" src="js/ajax-livesearch-jquery.js"></script>
</body>

</html>