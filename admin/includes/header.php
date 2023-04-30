<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link href="css/style.css" rel="stylesheet" />
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/custom_jquery.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="admin_body">
        <div class="row">
            <div class="col-md-2 col-1" id="sidebar">
                <h2>Admin Panel</h2>

                <div id="blank2">  </div>

                <a href="index.php">
                    <div id="menu" style="<?php echo $dashboard; ?>">Dashboard</div>
                </a>
                <a href="product.php">
                    <div id="menu" style="<?php echo $product; ?>">Products</div>
                </a>
                <a href="order.php">
                    <div id="menu" style="<?php echo $order; ?>">Orders</div>
                </a>
                <a href="contact.php">
                    <div id="menu" style="<?php echo $contact; ?>">Contacts</div>
                </a>
                <a href="feedback.php">
                    <div id="menu" style="<?php echo $feedback; ?>">Feedbacks</div>
                </a>
                <a href="logout.php">
                    <div id="menu" style="<?php echo $logout; ?>">Logout</div>
                </a>
            </div>
            <!-- sidebar end -->
