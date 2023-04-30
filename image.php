<?php
error_reporting(1);
$img = $_GET['img'];
$page = $_GET['page'];

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title><?php echo $img; ?></title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="css/responsive.css" rel="stylesheet" />
  <style>
    #con{
        overflow-y: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #img{
        margin-top: 20px;
        max-width: 600px;
    }
    .btn{
        color: white;
        text-decoration: none;
        background-color: #e9502a;
    }
  </style>
</head>
<body>
    <div class="container">
        <div id="con">
            <img src="admin/product_img/<?php echo $img; ?>" alt="img" id="img">
        </div><br>
            <a href="menu.php?page=<?php echo $page; ?>" class="btn">Back</a>
    </div>
</body>