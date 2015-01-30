<?php
/*
* Name: Calendar App/index.php
* This script shows the full calendar includes the next and previus buttons. 
* @author farhoodrashidi
* @date 01/06/2015
*/

include 'controller/object.php';    
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
        
        <p><?=$newEvent->showMessage(); ?></p>
        </div>
        <footer>
            Copyright <?=date('Y'); ?>, Farhood Rashidi
        </footer>
    </body>
</html>
