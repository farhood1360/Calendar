<?php
/*
* Name: Calendar App/index.php
* This script gets current day, current month, current year, and current timezone of calendar 
* This script shows the full calendar includes the next and previus buttons. 
* @author farhoodrashidi
* @date 12/23/2014
*/

include 'model/class.CALENDAR.php';
if(isset($_GET["day"])){
    $currentDay = $_GET["day"];
}else{
    $currentDay = date('j');
}

if(isset($_GET["month"])){
    $currentMonth = $_GET["month"];
}else{
    $currentMonth = date('m');
}

if(isset($_GET["year"])){
    $currentYear = $_GET["year"];
}else{
    $currentYear = date('Y');
}

$newCalendar = new Calendar($currentDay, $currentMonth, $currentYear, 'CST6CDT');
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Calendar:: Home</title>
        <link type="text/css" href="view/css/calendar.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <?php echo $newCalendar->render(); ?>
        <?php if(isset($_GET["today"])){echo $newCalendar->showMessage();} ?>
        <br/><br/>
        </div>
        <footer>
            Copyright <?php echo date('Y'); ?>, Farhood Rashidi
        </footer>
    </body>
</html>
