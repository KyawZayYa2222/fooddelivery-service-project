<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit product</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link href="css/style.css" rel="stylesheet" />
</head>

<?php
error_reporting(1);
include('includes/connection.php');
$id = $_GET['id'];
// echo $id;
if(isset($_POST['upd'])) {
    $error = "";
    $pn = $_POST['pname'];
    $p = intval($_POST['price'])."Ks";
    $d = $_POST['desc'];
    $pimg = $_FILES['img']['name'];
    if($pn=="" || $p=="" || $d=="" || $pimg==""){
        $error = "Please fill all fields";
    }
    else{
        //insert new data to database
        $upd = mysqli_query($connect, "UPDATE product SET pname='$pn',price='$p',description='$d',image='$pimg' where id='$id'");

        // for updating image
        $data = mysqli_query($connect, "SELECT * FROM product where id='$id'");
        $res = mysqli_fetch_assoc($data);
        $old_img = $res['image'];
        //delete old image in folder
        unlink("product_img/$old_img");
        //insert new image to folder
        move_uploaded_file($_FILES['img']['tmp_name'],"product_img/".$_FILES['img']['name']);
        //back to product
        header('location: product.php?back=upd');

    }
}
?>

<body>
    <center>
    <div style="margin-top: 50px">
        <h3>Update Product</h3>
        <font color="red"><h5><?php echo $error; ?></h5></font>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
                        <table style="margin-top: 50px" class="fs18">

                            <tr>
                                <td>Name</td>
                                <td><input type="text" name="pname" id="pname" placeholder="Product"></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><input type="text" name="price" id="price" placeholder="3000Ks"></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="desc">Description</label>
                                    <textarea name="desc" id="desc" cols="30" rows="4" placeholder="Short and sharp description"></textarea>
                                    <!-- <label for="desc">Description</label> -->
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="file" name="img" class="file" id="pimg">
                                </td>
                            </tr>
                            <tr>
                                <td><input type="submit" name="upd" value="&nbsp;Update&nbsp;" id="upd"></td>
                                <td><button id="cel"><a href="product.php">Cancel</a></button></td>
                            </tr>
                        </table>
                    </form>
    </center>
</body>
</html>