<?php
/*
* Name: Calendar App/index.php
* This script gets date and stors on database. 
* @author farhoodrashidi
* @date 12/17/2014
*/

$content = "&#160;";
$day = "";
$month =  "";
$year =  "";

if(isset($_GET["day"])){
    $day = $_GET["day"];
}else{
    $day = date('j');
}

if(isset($_GET["month"])){
    $month = $_GET["month"];
}else{
    $month = date('m');
}

if(isset($_GET["year"])){
    $year = $_GET["year"];
}else{
    $year = date('Y');
}

$preYear = $year;
$nextYear = $year;
$preMonth = $month-1;
$nextMonth = $month+1;

if($preMonth ==0){
    $preMonth =12;
    $preYear--;
}

if($nextMonth ==13){
    $nextMonth =1;
    $nextYear++;
}

$firstDay = mktime(0, 0, 0, $month, 1, $year);
$title =  date('F', $firstDay);
$week = date('D', $firstDay);

switch($week){
    case
        "Sun": $blank = 0;
        break;
    case 
        "Mon": $blank = 1; 
        break;
    case 
        "Tue": $blank = 2;
        break; 
    case 
        "Wed": $blank = 3;
        break;
    case
        "Thu": $blank = 4;
        break;
    case 
        "Fri": $blank = 5; 
        break;
    case 
        "Sat": $blank = 6;     
        break;   
}

$daysCount = cal_days_in_month(CAL_GREGORIAN, $month, $year); 
$day_count = 1;

while($blank > 0){
    $content =  "<td></td>"; 
    $blank = $blank-1;
    $day_count++;
}

$dayNum = 1;

while($dayNum <= $daysCount){ 
    $content .= "<td> $dayNum </td>";
    $dayNum++;
    $day_count++; 
    
    if($day_count > 7){
        $content .=  "</tr><tr>"; 
        $day_count = 1;    
    }   
}

while($day_count >1 && $day_count <=7){ 
    $content .=  "<td></td>";
    $day_count++; 
}
     
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Calendar:: Home</title>
        <link type="text/css" href="view/css/calendar.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <h2><?php echo $year; ?> Calendar</h2>
        <div id="calendar" >      
            <a href="<?php echo  " ?month=" . $preMonth . " &year=" . $preYear; ?>" id="pre">
                <img src="view/image/pre.png" width="30" height="30" alt="previous" title="Previous"
                    onmouseover="this.src='view/image/pre_over.png'" onmouseout="this.src='view/image/pre.png'">
            </a>
            <a href="<?php echo  " ?month=" . $nextMonth . " &year=" . $nextYear; ?>" id="next">
                <img src="view/image/next.png" width="30" height="30" alt="next" title="Next" 
                    onmouseover="this.src='view/image/next_over.png'" onmouseout="this.src='view/image/next.png'">
            </a>
            <h3><?php echo $title; ?></h3>
            <hr/>
            <table border="1">
                <tr>
                    <th>Sun</th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Sat</th>
                </tr>
                <tr>
                    <?php echo $content; ?>
                </tr>
            </table>
            <br/>
        </div>
        <footer>
            Copyright <?php echo date('Y'); ?>, Farhood Rashidi
        </footer>
    </body>
</html>
