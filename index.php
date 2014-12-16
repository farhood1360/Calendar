<?php
/*
* Name: Calendar App/index.php
* This script gets the current date and then shows the current month on western-style calendar. 
* @author farhoodrashidi
* @date 12/15/2014
*/

$content = "&#160;";
$day = date('d');
$month =  date('m');
$year =  date('Y');

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

$daysCount = cal_days_in_month(0, $month, $year); 
$day_count = 1;

while ( $blank > 0 ) {
    $content =  "<td></td>"; 
    $blank = $blank-1;
    $day_count++;
}

$dayNum = 1;

while ( $dayNum <= $daysCount ) { 
    $content .= "<td> $dayNum </td>";
    $dayNum++;
    $day_count++; 
    
    if ($day_count > 7) {
        $content .=  "</tr><tr>"; 
        $day_count = 1;    
    } 
}

while ( $day_count >1 && $day_count <=7 ) { 
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
        <h2><?php echo $year ?> Calendar</h2>
        <div id="calendar">      
            <h3><?php echo $title ?></h3>
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
                <?php echo $content ?>
            </table>
        </div>    
    </body>
</html>
