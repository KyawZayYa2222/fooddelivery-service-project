<?php
error_reporting(1);
$link = "menu.php";
$display = "block";
$title = "Menu";
$head_con = "hero_area sub_pages";
include_once('includes/header.php');
include_once('includes/connection.php');
echo "</div>";

$alert = "";
$name = $_POST['name'];
$ph = $_POST['phone'];
$email = $_POST['email'];
$mess = $_POST['message'];

if(isset($_POST['send'])){
  $query = mysqli_query($connect, "INSERT INTO contact values('', '$name', '$ph', '$email', '$mess', 'No')");
  $alert = "Your message has sent.";
}
?>

<!-- contact section -->
<section class="contact_section layout_padding">
    <div class="container">
      <h2 class="font-weight-bold">
        Contact Us
      </h2>
      <div class="row">
        <div class="col-md-7 mr-auto">
          <form action="" method="post">
            <div class="contact_form-container">
              <div>
                <div>
                  <p><?php echo $alert; ?></p>
                </div>
                <div>
                  <input type="text" name="name" placeholder="Name">
                </div>
                <div>
                  <input type="text" name="phone" placeholder="Phone Number">
                </div>
                <div>
                  <input type="email" name="email" placeholder="Email">
                </div>

                <div class="mt-5">
                  <input type="text" name="message" placeholder="Message">
                </div>
                <div class="mt-5">
                  <button type="submit" name="send">
                    send
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-5">
          <div id="contact-imgcon">
          <img src="template_img/contact-bg.png" id="contact-bg" alt="img">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

<?php
include_once('includes/footer.php');
?>