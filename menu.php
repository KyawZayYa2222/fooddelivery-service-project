<?php
// header infos of menu page
$link = "menu.php";
$display = "block";
$title = "Menu";
$head_con = "hero_area sub_pages";
include('includes/header.php');
echo "</div>";
// end 
?>

  <!-- food menus section -->
<?php
error_reporting(1);
include('includes/connection.php');
?>

  <section class="fruit_section">
    <center>
    <div id="menu_header">
      <h2>Food Menu</h2>
      <h6>Find your delicious menu here.</h6>
    </div>
    <div class="container">

<?php
// num of product per page 
$limit = 8;
// get data from db 
$result = mysqli_query($connect, "SELECT * FROM product");
// num of page 
$total_rows = mysqli_num_rows($result);
$total_pages = ceil($total_rows / $limit);
// getting page num 
if(!isset($_GET['page'])){
    $page_number = 1;
}
else{
    $page_number = $_GET['page'];
}
//get the initial page number
$initial_page = ($page_number-1) * $limit;
//get data of selected row per page
$final_result = mysqli_query($connect, "SELECT * FROM product LIMIT $initial_page, $limit");
//display the result on webpage
while(list($id,$pname,$price,$desc,$img) = mysqli_fetch_array($final_result)) {
    echo    "<div id='card' class='mt-3'>
            <div id='card_head'>
            <a href='image.php?img=".$img."&&page=".$page_number."'>
            <img src='admin/product_img/".$img."' alt='img' style='width: 270px;'>
            </a>
            </div>";
    echo    "<div id='card_content'>
            <h4>".$pname."</h4>
            <h6>".$desc."</h6> 
            <h5>".$price."</h5>
            <a href='order_page.php?id=".$id."&&page=".$page_number."'><div>Deliver</div></a>";
    echo    "</div>
            </div>";
}
// pagination button bar 
echo "<div id='pag_bar'>";
if($page_number>1){
    echo '<a class="btn btn-secondary"  
    href="menu.php?page=' . ($page_number - 1). '">' . 'Prev' . ' </a>'.'&nbsp;';
}else{
    echo '<a class="btn btn-secondary" style="cursor:no-drop" 
    href="menu.php?page='.$page_number.'">' . 'Prev' . ' </a>'.'&nbsp;';
}

for($i = 1; $i<=$total_pages; $i++){
    if($page_number == $i) {
        $active = 'background-color:#e9502a';
    }else {
        $active = 'background-color:gray';
    }
    echo '<a class="btn" style="'.$active.'" href="menu.php?page=' . $i . '">' . $i . ' </a>'.'&nbsp;';  
}

if($page_number<$total_pages) {
    echo '<a class="btn btn-secondary"
    href = "menu.php?page=' . ($page_number + 1). '">' . 'Next' . ' </a>'.'&nbsp;';
}else {
    echo '<a class="btn btn-secondary" style="cursor:no-drop" 
    href="menu.php?page='.$page_number.'">' . 'Next' . ' </a>'.'&nbsp;';
}
echo "</div>";
?>
      
    </div>
    </center>
  </section>

<?php
include('includes/footer.php');
?>
  