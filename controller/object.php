<?php
/*
* Name: Calendar App/Controller/object.php
* This script gets current day, current month, current year, and current timezone of calendar 
* @author farhoodrashidi
* @date 01/06/2015
*/

include 'model/class.CALENDAR.php';
include 'model/class.EVENT.php';

date_default_timezone_set('CST6CDT');
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

$date = $currentYear . "-" . $currentMonth . "-" . $currentDay;

if(isset($_POST["submit"])) {
    if(empty($_POST['name']) || empty($_POST['event'])) {
        $warning = "<p class='warning'>You must enter your name and event. <br> Click the submit button again.</p>";
    } else {
        $name = ucfirst($_POST['name']);
        $event = ucfirst($_POST['event']);
        $type = ucfirst($_POST['type']);
        $description = ucfirst($_POST['des']);
        $time = addslashes($_POST['time']);
    }
}

$newCalendar = new Calendar($currentDay, $currentMonth, $currentYear);
$newEvent = new Event($name, $event, $type, $description, $date, $time);
$newEvent->disconnect();
//$newCalendar->disconnect();

