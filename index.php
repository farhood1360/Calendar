<?php
/*
* Name: Calendar App/index.php
* This script gets current day, current month, current year, and current timezone of calendar 
* This script shows the full calendar includes the next and previus buttons. 
* @author farhoodrashidi
* @date 01/01/2015
*/

include 'model/class.CALENDAR.php';
include 'model/database.php';

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

if(isset($_POST["submit"])) {
    if(empty($_POST['name']) || empty($_POST['event'])) {
        $warning = "<p class='warning'>You must enter your name and event. <br> Click the submit button again.</p>";
    } else {
        $name = addslashes($_POST['name']);
        $event = addslashes($_POST['event']);
        $type = addslashes($_POST['type']);
        $description = addslashes($_POST['des']);
        $time = addslashes($_POST['time']);
    }
}

$newCalendar = new Calendar($currentDay, $currentMonth, $currentYear);
$newDatabae = new Database($name, $event, $type, $description, $time);
$newDatabae->connection();
$newDatabae->select();
$newDatabae->insert();
$newDatabae->query();
$newDatabae->disconnect();
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Calendar:: Home</title>
        <link type="text/css" href="view/css/calendar.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <?=$newCalendar->render(); ?>
        <?php if(isset($_GET["today"])){echo $newCalendar->showMessage();} ?>
        <br/><hr/>
        <form id="eventManager" action="index.php" name="event manager" method="POST">
            <p>
                <label for="name"><span>*</span>Your Name</label> 
                <input name="name" id="name" type="text" size="17" /> 
            </p>
            
            <p>
                <label for="event"><span>*</span>Your Event</label> 
                <input name="event" id="event" type="text" size="17" /> 
            </p>

            <p>
                <label for="type"><span>*</span>Event Type</label>
                <select name="type">
                    <option>Select One</option>
                    <option>Health</option>
                    <option>Work</option>
                    <option>Entertainment</option>
                    <option>Home</option>
                </select>
            </p> 
            
            <p>
                <label for="time"><span>*</span>Event Time</label> 
                <input name="time" id="time" type="time" size="17" /> 
            </p>
            
            <p>
                <label for="des"><span>*</span>Event Description</label> 
                <textarea name="des" id="des" value="Event Description" cols="17"></textarea> 
            </p>

            <p>
                <input name="submit" type="submit" id="mySubmit" class="button" value="Submit" />
                <input name="reset" type="reset" value="Reset" class="button" />
            </p>
            
            <?=$warning; ?>
        </form>
        </div>
        <footer>
            Copyright <?=date('Y'); ?>, Farhood Rashidi
        </footer>
    </body>
</html>
