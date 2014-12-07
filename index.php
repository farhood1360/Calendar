<?php
/*
* Name: Calendar App/index.php
* This script gets date and stors on database. 
* @author farhoodrashidi
* @date 12/05/2014
*/

$name = "";
$event = "";
$date = "";
$id = "";
$message = "&#160;";

session_start();
if(isset($_POST["submit"])) {
    if(empty($_POST['name']) || empty($_POST['event'])) {
        $message = "<p style='color: red'>You must enter your name and event. <br> Click the submit button again.</p>";
    } else {
        $name = addslashes($_POST['name']);
        $event = addslashes($_POST['event']);
        //$date = addslashes($_POST['date']);
        $_SESSION["name"] = "$name";
        $database = new mysqli("localhost", "admin", "password", "calendar");
        date_default_timezone_set('CST6CDT');
        $date = date('d/m/y');
        $id = rand(100, 200);
        $database->query("INSERT INTO event(name, event, date_picked, id) VALUES('$name', '$event', '$date', '$id')");
        $database->query("DELETE FROM event WHERE name='admin'");
        $database->close();
        header('Location: view/result.php');
    }
}

if(isset($_POST["reset"])) {
    $message = "";
}	 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Calendar:: Home</title>
        <link type="text/css" href="view/css/calendar.css" rel="stylesheet"/>
    </head>

    <body>
        <h2>2015 Calendar</h2>
        <form id="calendar" action="index.php" name="calendar" method="POST">
        
            <h3>January</h3>
            <hr/>
            <button id="1" name="1" value="1" >1</button>&nbsp;&nbsp;
            <button id="2" name="2" value="2" >2</button>&nbsp;&nbsp;
            <button id="3" name="3" value="3" >3</button>&nbsp;&nbsp;
            <button id="4" name="4" value="4" >4</button>&nbsp;&nbsp;
            <button id="5" name="5" value="5" >5</button>&nbsp;&nbsp;
            <button id="6" name="6" value="6" >6</button>&nbsp;
            <button id="7" name="7" value="7" >7</button>
            <br/>
            <button id="8" name="8" value="8" >8</button>&nbsp;&nbsp;
            <button id="9" name="9" value="9" >9</button>&nbsp;
            <button id="10" name="10" value="10" >10</button>
            <button id="11" name="11" value="11" >11</button>
            <button id="12" name="12" value="12" >12</button>
            <button id="13" name="13" value="13" >13</button>
            <button id="14" name="14" value="14" >14</button>
            <br/>
            <button id="15" name="15" value="15" >15</button>
            <button id="16" name="16" value="16" >16</button>
            <button id="17" name="17" value="17" >17</button>
            <button id="18" name="18" value="18" >18</button>
            <button id="19" name="19" value="19" >19</button>
            <button id="20" name="20" value="20" >20</button>
            <button id="21" name="21" value="21" >21</button>
            <br/>
            <button id="22" name="22" value="22" >22</button>
            <button id="23" name="23" value="23" >23</button>
            <button id="24" name="24" value="24" >24</button>
            <button id="25" name="25" value="25" >25</button>
            <button id="26" name="26" value="26" >26</button>
            <button id="27" name="27" value="27" >27</button>
            <button id="28" name="28" value="28" >28</button>
            <br/>
            <button id="29" name="29" value="29" >29</button>
            <button id="30" name="30" value="30" >30</button>
            <button id="31" name="31" value="31" >31</button>

            <p>
                <input name="pev" type="submit" id="pev" class="button" value="Previous" onclick="pev()" />
                <input name="next" type="submit" id="next" value="Next" class="button" onclick="next()" />
            </p>

            <br/>

            <p>
                <label for="name"><span>*</span>Your Name</label> 
                <input name="name" id="name" type="text" value="Your Name" size="17" /> 
            </p>

            <p>
               <label for="event"><span>*</span>Your Event</label>
                <select name="event" id="event">
                    <option>Select One</option>
                    <option>Health</option>
                    <option>Work</option>
                    <option>Entertainment</option>
                    <option>Home</option>
                </select>
            </p>

            <p>
                <input name="submit" type="submit" id="mySubmit" class="button" value="Submit" />
                <input name="reset" type="reset" value="Reset" class="button" />
            </p>

            <p><?php date_default_timezone_set('CST6CDT'); echo "Today is: " . date('l d/m/y h:i:s A'); ?></p>
            <p><?php echo $message; ?></p>
        </form>    
    </body>
</html>