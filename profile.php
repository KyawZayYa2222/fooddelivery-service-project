<?php
error_reporting(1);
$link = "profile.php";
$display = "none";
$title ="Profile";
include('includes/header.php');

session_start();
if($_SESSION['user_email']==""){
    header('location: login.php?link=profile.php');
}
else{
  $email = $_SESSION['user_email'];
  include('includes/connection.php');
  $query = mysqli_query($connect, "SELECT * FROM register where email='$email'");
  while($row = mysqli_fetch_assoc($query)){
    $name = $row['name'];
    $ph = $row['phone'];
    $adr = $row['address'];
    $img = $row['image'];
  }
  
  if(isset($_POST['upload'])){
    $img = $_FILES['img']['name'];
    $upd = mysqli_query($connect, "UPDATE register SET image='$img' where email='$email'");
    mkdir("user_img/$email");
    move_uploaded_file($_FILES['img']['tmp_name'],"user_img/$email/".$_FILES['img']['name']);
  }
  if(isset($_POST['upd'])){
    $path = "user_img/$email/$img";
    unlink($path);
    $img = $_FILES['img']['name'];
    $upd = mysqli_query($connect, "UPDATE register SET image='$img' where email='$email'");
    move_uploaded_file($_FILES['img']['tmp_name'],"user_img/$email/".$_FILES['img']['name']);
  }
?>

  <!-- profile section  -->
  <section >
      <div class="container">
        <div class="row rows-col-1 mt-2">
          <div class="col col-md-4 mt-2" align="center">
            <div align="left" class="ml-2">
              <a href="logout.php">Logout</a>
            </div>
            <div id="profile_con">
              <img src="user_img/<?php echo $email.'/'.$img; ?>" alt="img" width="200px">
            </div>
            <div align="left" class="ml-2">
              <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="img" class="mb-1 mt-1">
<?php
if($img == ""){
  echo "<button type='submit' name='upload' class='btn btn-sm btn-primary'>Upload Profile</button>";
}
else{
  echo "<button type='submit' name='upd' class='btn btn-sm btn-primary'>Update Profile</button>";
}
?>
              </form>
            </div>
          </div>
          <div class="col col-md-6 mt-3">
            <div style="width: 300px">
              <h3 class="ml-2"><?php echo $name; ?></h3>
              <h4 class="ml-2">Ph: <?php echo $ph; ?></h4>
              <h5 class="ml-2"><?php echo $email; ?></h5>
              <p class="ml-2"><?php echo $adr; ?></p>
              <!-- <button class="btn btn-primary ml-2">Edit Info</button> -->
            </div>
          </div>

        </div>
        <hr>
        <h4 class="ml-2">Your order history</h4>
        <div align="center">
          <table class="table">
            <tr class="thead-light">
              <th>No.</th>
              <th>Product</th>
              <th>Price</th>
              <th>Number</th>
            </tr>
<?php
  $order = mysqli_query($connect, "SELECT * FROM orderdb where name='$name'");
  $i = 0;
  if(mysqli_num_rows($order) > 0){
    while($ord = mysqli_fetch_assoc($order)){
      $i++;
      echo "<tr>";
      echo "<td>".$i."</td>";
      echo "<td>".$ord['product']."</td>";
      echo "<td>".$ord['price']."</td>";
      echo "<td>".$ord['number']."</td>";
      echo "</tr>";
    }
  }
  else {
    echo "<td colspan='4' align='center'>No order has been yet!</td>";
  }
?>
          </table><hr>
        </div>
      </div>
  </section>

<?php
}
include('includes/footer.php');
?>