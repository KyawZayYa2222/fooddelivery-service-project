<?php
error_reporting(1);
$link = "index.php";
$display = "block";
$title = "Home";
$head_con = "hero_area";
include_once('includes/header.php');
?> 

    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="slider_item-box">
              <div class="slider_item-container">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="slider_item-detail">
                        <div id="content">
                          <h1>
                            Delicious tomato <br />
                            huge pizza
                          </h1>
                          <p>
                            Pizza! Pizza!
                            Here, 12 inches sized tomato pizza for pizza carziers.
                            Good quality ingreadents, soft bread, many cheese, fresh tomato and
                            nice taste.Don't think about more, lets taste now. 
                          </p>
                          <div class="d-flex">
                            <a href="order_page.php?id=8" class="text-uppercase custom_orange-btn mr-3">
                              Order Now
                            </a>
                            <a href="" class="text-uppercase custom_dark-btn">
                              Contact Us
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="slider_img-box">
                        <div>
                          <img src="template_img/pizza02.png" alt="" class="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="slider_item-box">
              <div class="slider_item-container">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="slider_item-detail">
                        <div id="content">
                          <h1>
                            Green Chile <br />
                            Cheeseburger
                          </h1>
                          <p>
                            For burger lovers, tasty green chile Cheeseburger included good 
                            ingreadents such as pork chips, oinon, soft and fresh beef, big 
                            burger bread.Order now! Lets taste it!
                          </p>
                          <div class="d-flex">
                            <a href="order_page.php?id=17" class="text-uppercase custom_orange-btn mr-3">
                              Order Now
                            </a>
                            <a href="" class="text-uppercase custom_dark-btn">
                              Contact Us
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="slider_img-box">
                        <div>
                          <img src="template_img/burger.png" alt="" class="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="slider_item-box">
              <div class="slider_item-container">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="slider_item-detail">
                        <div id="content">
                          <h1>
                            Platinum Grade <br />
                            Seafood Plate
                          </h1>
                          <p>
                            Full of plate seafood plate containing all of food from sea 
                            like huge prawn, crawfish, lobsters, teredo and perfect sauce.
                            You should order now because of fresh gient prawn and you will love it.
                          </p>
                          <div class="d-flex">
                            <a href="order_page.php?id=10" class="text-uppercase custom_orange-btn mr-3">
                              Order Now
                            </a>
                            <a href="" class="text-uppercase custom_dark-btn">
                              Contact Us
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="slider_img-box">
                        <div>
                          <img src="template_img/seafood.png" alt="" class="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="custom_carousel-control">
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>

    <!-- end slider section -->
  </div>
</div>

  <!-- service section -->

  <section id="service" class="service_section layout_padding ">
    <div class="container">
      <h2 class="custom_heading">Our Services</h2>
      <p class="custom_heading-text">
         Here are some reasons why you should choice our company and services that we give. 
      </p>
      <div class=" layout_padding2">
        <div class="card-deck">

<?php
  function serviceCard($title,$text,$img){
  echo  "<div class='card'>
        <img class='card-img-top' src='template_img/$img' alt='Card image cap' />
        <div class='card-body'>
          <h5 class='card-title'>$title</h5>
          <p class='card-text'>$text</p>
        </div>
        </div>";
  }
  #card 1
  $title = "Fresh Ingredients";
  $text = " We use good quality and fresh Ingredients like meal and vegetables.
          We give good quality and tasty and we have recommendation of FDA.";
  $img = "card-item-3.png";
  serviceCard($title,$text,$img);
  #card 2
  $title = "Delicious Menus";
  $text = " Various delicious food can get in our site.Our chefs are professional chefs
          and have great skills.So menus are excellent and delicious.";
  $img = "menu_icon.png";
  serviceCard($title,$text,$img);
  #card 3
  $title = "Fast Delivery";
  $text = "We make fast and secure delivery.We work with secure and famous delivery company
          to pay excellent delivery service.";
  $img = "fast_deli.png";
  serviceCard($title,$text,$img);
?>

        </div>
      </div>
      <div class="d-flex justify-content-center">
        <a href="service.php" class="custom_dark-btn">
          Read More
        </a>
      </div>
    </div>
  </section>
  <!-- end service section -->

  <!--Latest Menu section -->
  <section class="menu_section">
    <div class="container" align="center">
      <h2 class="custom_heading">Latest Menus</h2>
<?php
error_reporting(1);
include_once('includes/connection.php');
$query = mysqli_query($connect, "SELECT * FROM product order by id DESC");
for($i=0; $i<8; $i++){
  $row = mysqli_fetch_assoc($query);
  $id = $row['id'];
  $pname = $row['pname'];
  $price = $row['price'];
  $pimg = $row['image'];
  echo "<a href='order_page.php?id=".$id."'><table class='table' id='menutb'>
          <tr id='tb_row'>
            <td width='33%'>
              <div id='img'>
                <img src='admin/product_img/".$pimg."' alt='img' width='100px'> 
              </div>
            </td>
            <td width='34%' style='border:none'>
              <p>".$pname."</p>
            </td>
            <td width='33%' style='border:none'>
              <p>".$price."</p>
            </td>
          </tr>
        </table></a>";
}
?>
    </div>
  </section>
   <!-- end latest menu section -->

   <!-- tasty section -->
  <section class="tasty_section mt-5">
    <div class="container_fluid">
      <h2>
        Taste Your Heaven
      </h2>
    </div>
  </section>

  <!-- end tasty section -->

<?php
include('contact.php');
?>

<?php
include_once('includes/footer.php');
?>