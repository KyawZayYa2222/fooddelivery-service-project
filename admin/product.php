<?php
error_reporting(1);
session_start();
if($_SESSION['name']=="" && $_SESSION['pass']==""){
    header('location: login.php');
}
else{
    $title = "Admin Product";
    $product = "background-color: white; color: black;";
    include('includes/header.php');
?>

            <div class="col-md-10 col-11" id="admin_content">
                <div id="content_head">
                    <nav>
                        <img src="img/logo02.png" alt="logo" width="75px">
                    </nav>
                    <h3 style="text-align:center">Product View</h3>
                </div><hr>
                
                <button id="add" class="margin">Add New+</button>
                
<?php
// error_reporting(1);
include('includes/connection.php');
if(isset($_POST['add'])){
    $error = "";
    $pname = $_POST['pname'];
    $price = intval($_POST['price'])."Ks";
    $desc = $_POST['desc'];
    $pimg = $_FILES['img']['name'];
    if($pname=="" || $price=="" || $desc=="" || $pimg==""){
        $error = "Please fill all fields";
    }
    else{
        // echo "success";
        // echo $price;
        $data = "INSERT INTO product VALUES('','$pname','$price','$desc','$pimg')";
        $insert = mysqli_query($connect, $data);
        move_uploaded_file($_FILES['img']['tmp_name'],"product_img/".$_FILES['img']['name']);

        // Sending anouncements of new product to all subscribers 
        $query = mysqli_query($connect, "SELECT * FROM subscribers");

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
    .pt{
      padding-top: 10px;
    }
    .ml{
      margin-left: 20px;
    }
    .mb{
      margin-bottom: 20px;
    }
    .con{
      border-radius: 10px;
      background-color: #fc5d35;
    }
    .head{
      line-height: 20px;
    }
    .body{
      border-bottom-left-radius: 10px;
      border-bottom-right-radius: 10px;
      background-color: #dbdbdb;
    }
    img{
      width: 400px;
    }
    .btn{
      display: block;
      padding: 8px 0px 8px 0px;
      color: white;
      text-decoration: none;
      font-size: 20px;
      border-bottom-left-radius: 10px;
      border-bottom-right-radius: 10px;
      background-color: #fc5d35;
    }
  </style>
</head>
<body>
  <div class='con'>
    <div class='head'>
      <h1 class='ml pt'>Hay, Customer</h1>
      <h2 class='ml'>We have some new for you!</h2>
    </div>
    <div class='body' align='center'>
      <h2 class='pt'>".$pname."</h2>
      <img src='http://kyawzayya3706.ojtstudent.com/product_img/".$pimg."' class='mb' alt='img'>
      <a href='menu.php' class='btn'>Order Now</a>
    </div>
  </div>
</body>
</html>";

        while(list($id, $email) = mysqli_fetch_array($query)){
            mail($email,$subject,$body,$headers);
        }
    }
    
}
?>
<center>
            <span style="margin: 20px; font-size: 18px; color: red"><?php echo $error; ?></span>
                <div id="pform_con">
                  <!-- <center> -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <h3>Add Product</h3>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td><input type="text" name="pname" id="pname" placeholder="Product"></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><input type="text" name="price" id="price" placeholder="2000ks"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="desc">Description</label>
                                    <textarea name="desc" id="desc" cols="30" rows="4" placeholder="short and sharp description"></textarea>
                                    <!-- <label for="desc">Description</label> -->
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="file" name="img" class="file" id="pimg">
                                </td>
                            </tr>
                            <tr>
                                <td><input type="submit" name="add" value="&nbsp;Add&nbsp;" id="add"></td>
                                <td><button id="cel"><a href="product.php">Cancel</a></button></td>
                            </tr>
                        </table>
                    </form>
                  <hr>
                </div>

<?php
//for confirm alert text 
if($_GET['back'] == "upd") {
    echo "<font color='green' align='center'><h4>Product successfully updated.</h4></font><br>";
}
if ($_GET['back'] == "del") {
    echo "<font color='red' align='center'><h4>Product successfully deleted.</h4></font><br>";
}

// for product CRUD table
$data = mysqli_query($connect, "SELECT * FROM product");
if(mysqli_num_rows($data) > 0){
    
            echo    '<table id="prod_tb" class="table fs18">
                    <tr id="ptb_head">
                        <th width="5%">Id</th>
                        <th width="15%">Image</th>
                        <th width="20%">Name</th>
                        <th width="10%">Price</th>
                        <th width="25%">Description</th>
                        <th width="25%">Actions</th>
                    </tr>';

    while(list($pid,$pn,$p,$d,$pim) = mysqli_fetch_array($data)){

        echo    '<tr id="ptr">
                <td>'.$pid.'</td>
                <td><img src="product_img/'.$pim.'" alt="img" width="120px"></td>
                <td>'.$pn.'</td>
                <td>'.$p.'</td>
                <td>'.$d.'</td>
                <td>
                <a href="update.php?id='.$pid.'" id="upd">Update</a>
                <a href="delete.php?source=product&&id='.$pid.'" id="del">Delete</a></td>
                </tr>';

    }
    echo    "</table>";
}
else{
    echo "Add a product";
}
?>

</center>
            </div>

<?php 
include('includes/footer.php');
}
?>