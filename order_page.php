<?php
error_reporting(1);
$link = "order_page.php";
$id = $_GET['id'];
$page = $_GET['page'];
session_start();
if(!isset($_SESSION['user_email'])) {
    header('location: login.php?link=menu.php?page='.$page.'');
}
else {
    $email = $_SESSION['user_email'];
    include('includes/connection.php');
    // getting product data
    $product_data = mysqli_query($connect, "SELECT * FROM product where id='$id'");
    while($row = mysqli_fetch_assoc($product_data)) {
        $pname = $row['pname'];
        $price = $row['price'];
        $desc = $row['description'];
        $pimg = $row['image'];
    }
    // end //////

    // getting user data
    $user_data = mysqli_query($connect, "SELECT * FROM register where email='$email'");
    while($row = mysqli_fetch_assoc($user_data)) {
        $name = $row['name'];
        $ph = $row['phone'];
        $addr = $row['address'];
    }
    // end //////

    $display = "block";
    $title = $pname;
    include('includes/header.php');
?>

    <div class="container">
        <div class="mt-3 row rows-col-md-2">
            <div class="col" id="order-form">
                <h2><?php echo $pname; ?></h2>
                <p class="mt-2"><?php echo $desc; ?></p>
                <img src="admin/product_img/<?php echo $pimg; ?>" alt="img">
            </div>
            <div class="col">
              <div id="order-con" class="mt-md-5 mt-2">
                <form action="order.php" method="post" id="order-form">
                    <div class="contact_form-container">
                        <div>
                            <h2 class="font-weight-bold">
                            Order form
                            </h2>
                        </div>
                        <div class="mt-3">
                            <input type="text" name="name" placeholder="Your Name" value="<?php echo $name; ?>" required>
                        </div>
                        <div>
                            <input type="text" name="phone" placeholder="Phone Number" value="<?php echo $ph; ?>" required>
                        </div>
                        <div class="mt-5">
                            <input type="text" name="address" placeholder="Address" value="<?php echo $addr; ?>" required>
                        </div>
                        <div>
                            <input type="text" name="pname" placeholder="Product Name" value="<?php echo $pname; ?>" readonly required>
                        </div>
                        <div>
                            <input type="text" name="price" placeholder="Price" value="<?php echo $price; ?>" readonly required>
                        </div>
                        <div>
                            <input type="text" name="num" placeholder="Number" required>
                        </div>
                        <div class="mt-3 mb-3">
                            <button type="submit" name="order" class="orange-btn">
                            Order
                            </button>
                            <?php 
                            if(empty($page)){
                                echo "<a href='menu.php'class='btn btn-secondary'>Cancel</a>";
                            }
                            else{
                                echo "<a href='menu.php?page=".$page."'class='btn btn-secondary'>Cancel</a>";
                            }
                            ?>
                        </div>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>

<?php
include('includes/footer.php');
}
?>