<?php
// Set timezone 
date_default_timezone_set('Asia/Yangon');

// Get prev & next month 
if(isset($_GET['ym'])){
  $ym = $_GET['ym'];
}
else{
  // This month 
  $ym = date('Y-m');
}
// echo $ym;

// Check format 
$timestamp = strtotime($ym, "-01");
// echo $timestamp;
if($timestamp === false) {
  $timestamp = time();
}

// Today 
$today  = date('Y-m-d', time());

// for year & month  title
$html_title = date('Y/m', $timestamp);

// Create prev & next month link
$prev = date('Y-m', mktime(0,0,0, date('m',$timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0,0,0, date('m',$timestamp)+1, 1, date('Y', $timestamp)));
// echo $prev;

// Number of day in the month 
$day_count = date('t', $timestamp);

// 0:Sun 1:Mon 2:Tue etc. 
$str = date('w', mktime(0,0,0, date('m',$timestamp), 1, date('Y', $timestamp)));

// Create Calendar 
$weeks = array();
$week = '';

// Add empty cells 
$week .= str_repeat('<td></td>', $str);

for($day=1; $day<=$day_count; $day++, $str++){

  $date = $ym.'-'.$day;

  if($today == $date){
    $week .= '<td class="today">'.$day;
  }
  else{
    $week .= '<td>'.$day;
  }
  $week .= '</td>';

  // End of the weekend or end of the month 
  if($str % 7 == 6 || $day == $day_count){

    if($day == $day_count){
      // Add empty cell 
      $week .= str_repeat('<td></td>', 6-($str % 7));
    }

    $weeks[] = '<tr>'.$week.'</tr>';

    // Prepare for new week 
    $week = '';
  }

}

?>
  <h3 align="center">Calendar</h3>
  <div align="center">
    <h4 class="ym_head">
      <a href="?ym=<?php echo $prev; ?>"><&lt;</a>
        <?php echo $html_title; ?>
      <a href="?ym=<?php echo $next; ?>">>&gt;</a>
    </h4>
  </div>
  <table align="center" style="width: 16rem">
    <tr>
      <th>Sun</th>
      <th>Mon</th>
      <th>Tue</th>
      <th>Wed</th>
      <th>Thu</th>
      <th>Fri</th>
      <th>Sat</th>
    </tr>
    <?php 
    foreach($weeks as $week){
      echo $week;
    }
    ?>
  </table>