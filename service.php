<?php
error_reporting(1);
// header infos of service page
$link= "service.php";
$display = "block";
$title = "service";
$head_con = "hero_area sub_pages";
include('includes/header.php');
echo "</div>";
// end 
?>

<h1 class="custom_heading mt-2">Services</h1>
<p class="ml-auto custom_heading">Our company respects customers and give good services</p>
<div align="center">
    <div class="upper">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250"><path fill="#fff" 
    fill-opacity="1" d="M0,96L40,96C80,96,160,96,240,112C320,128,400,160,480,176C560,192,640,
    192,720,176C800,160,880,128,960,106.7C1040,85,1120,75,1200,85.3C1280,96,1360,128,1400,144L1440,
    160L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,
    0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path></svg>
    </div>
    <div class="lower">
        <div class="container">
            <img src="template_img/card-item-3.png" alt="img" width="100px">
            <h3>Fresh Ingredients</h3>
            <p>
                We use good quality and fresh Ingredients like meal and vegetables.
                Since 2018, our company started year, we never use an even a little bad ingredients.
                In a menu, taste is first, health is second so for health ingredients must fresh and be healthy.
                We give good quality and tasty and we have recommendation of FDA. 

            </p>
            <br><br>
            <img src="template_img/menu_icon.png" alt="img" width="100px">
            <h3>Delicious Menus</h3>
            <p>
                Our professional chefs will give you good experience of taste and various delicious menus.
                They are full of experience in kitchen and full of beautiful idea so you will not bore at menus.
                You can choice various delicious menus at the menu page of our site and enjoy it.
            </p>
            <br><br>
            <img src="template_img/cod_icon.png" alt="img" width="100px">
            <h3>Cash on Delivery</h3>
            <p>
                You can pay with many payment methods like master, visa, banking, etc,. Sorry, online payment is 
                recently unavaliable. If you don't
                mine, we use cash on delivery payment system so no problems for payment method like visa, banking, etc,.
                But for a lot of orders, you have to pay first with online payment.
            </p>
            <br><br>
            <img src="template_img/fast_deli.png" alt="img" width="100px">
            <h4>Fast Delivery</h4>
            <p>
                One of our excellent service is fast and secure delivery. We work with famous in secure 
                and proof for fast delivery campanies so you can trust and order.Don't worry for late.
            </p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250"><path fill="#fff" 
        fill-opacity="1" d="M0,96L40,96C80,96,160,96,240,112C320,128,400,160,480,176C560,192,640,
        192,720,176C800,160,880,128,960,106.7C1040,85,1120,75,1200,85.3C1280,96,1360,128,1400,
        144L1440,160L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,
        800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>
    </div>
    
</div>

<?php
include('includes/footer.php');
?>