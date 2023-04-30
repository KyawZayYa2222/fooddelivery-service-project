<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title><?php echo $title; ?></title>
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
  <link  rel="stylesheet" type="text/css" href="css/responsive.css"/>
  <!-- <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/custom-jquery.js"></script>hero_area sub_pages-->
</head>
<body>
  <div class="<?php echo $head_con; ?>">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="index.php">
            <img src="template_img/logo02.png" alt="" style="width: 75px;" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="menu.php"> Menu </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="service.php"> Services </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="feedback.php">Feedbacks</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div id="search-con">
          <form style="display: inline;">
            <span id="search-label">Search</span>&nbsp;<input type="text" name="search" placeholder="&nbsp;pizza.." id="search">
          </form>&nbsp; &nbsp;
          <div class="<?php echo $display; ?>">
          <a href="profile.php" id="login_btn">
            <img src="template_img/profile.png" alt="profile" width="30px">
            <span>Profile</span>
          </a>
          </div>
        </div>
        <div id="output">
            <!-- search output will display here -->
        </div>
      </div>
    </header>
    <!-- end header section -->
    <!-- </div> -->