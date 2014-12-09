<?php
/*
* Name: Calendar App/test.php
 * This script gets date and stors on database. 
* @author Farhood Rashidi
* @date: 11/07/2014
*/
    
$name = "";
$event = "";
$type= "";
$date = "";
$description = "";
$id = "";
$message = "&#160;";

session_start();
if(isset($_POST["submit"])) {
    if(empty($_POST['name']) || empty($_POST['event'])) {
        $message = "<p style='color: red'>You must enter your name and event. <br> Click the submit button again.</p>";
    } else {
        $name = addslashes($_POST['name']);
        $event = addslashes($_POST['event']);
        $type = addslashes($_POST['type']);
        $description = addslashes($_POST['des']);
        $date = addslashes($_POST['date']);
        $id = rand(100, 200);
        $_SESSION["name"] = "$name";
        $_SESSION["event"] = "$event";
        $_SESSION["date"] = "$date";
        $database = new mysqli("localhost", "root", "root", "calendar");
        $database->query("INSERT INTO event(name, event, type, description, date_picked, id) VALUES('$name', '$event', '$type', '$description', '$date', '$id')");
        $database->query("DELETE FROM event WHERE name='admin'");
        $database->close();
        header('Location: view/result.php');
    }
}

if(isset($_POST["reset"]))
{
    $message = "";
}

	 
function click() {
    echo "Button is clicked.";
}

	 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Calendar: Unit Test</title>
        <link type="text/css" href="view/css/calendar.css" rel="stylesheet"/>
        <script>
           function echoClick(){
             alert("<?PHP click(); ?>");
	    }
	</script>
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.5/angular.min.js"></script>
        <script src="view/js/calendar.js" type="text/javascript"></script>
    </head>

    <body ng-app="dateInput">
        <script>
            angular.module('dateInput', []).controller('DateController', [ '$scope', function($scope){
                $scope.value = new Date(2015, 01, 01);
            }]);
        </script>
        <h2>2015 Calendar</h2>
        <form id="calendar" action="test.php" name="calendar" method="POST" ng-controller="DateController as dateCtrl">      
            <h3>January</h3>
            <hr/>
            <button id="1" value="1" onclick="echoClick()">1</button>&nbsp;&nbsp;
            <button id="2" value="2" onclick="echoClick()">2</button>&nbsp;&nbsp;
            <button id="3" value="3" onclick="echoClick()">3</button>&nbsp;&nbsp;
            <button id="4" value="4" onclick="echoClick()">4</button>&nbsp;&nbsp;
            <button id="5" value="5" onclick="echoClick()">5</button>&nbsp;&nbsp;
            <button id="6" value="6" onclick="echoClick()">6</button>&nbsp;
            <button id="7" value="7" onclick="echoClick()">7</button>
            <br/>
            <button id="8" value="8" onclick="echoClick()">8</button>&nbsp;&nbsp;
            <button id="9" value="9" onclick="echoClick()">9</button>&nbsp;
            <button id="10" value="10" onclick="echoClick()">10</button>
            <button id="11" value="11" onclick="echoClick()">11</button>
            <button id="12" value="12" onclick="echoClick()">12</button>
            <button id="13" value="13" onclick="echoClick()">13</button>
            <button id="14" value="14" onclick="echoClick()">14</button>
            <br/>
            <button id="15" value="15" onclick="echoClick()">15</button>
            <button id="16" value="16" onclick="echoClick()">16</button>
            <button id="17" value="17" onclick="echoClick()">17</button>
            <button id="18" value="18" onclick="echoClick()">18</button>
            <button id="19" value="19" onclick="echoClick()">19</button>
            <button id="20" value="20" onclick="echoClick()">20</button>
            <button id="21" value="21" onclick="echoClick()">21</button>
            <br/>
            <button id="22" value="22" onclick="echoClick()">22</button>
            <button id="23" value="23" onclick="echoClick()">23</button>
            <button id="24" value="24" onclick="echoClick()">24</button>
            <button id="25" value="25" onclick="echoClick()">25</button>
            <button id="26" value="26" onclick="echoClick()">26</button>
            <button id="27" value="27" onclick="echoClick()">27</button>
            <button id="28" value="28" onclick="echoClick()">28</button>
            <br/>
            <button id="29" value="29" onclick="echoClick()">29</button>
            <button id="30" value="30" onclick="echoClick()">30</button>
            <button id="31" value="31" onclick="echoClick()">31</button>

            <p>
                <input name="pev" type="submit" id="pev" class="button" value="Previous" onclick="pev()" />
                <input name="next" type="submit" id="next" value="Next" class="button" onclick="next()" />
            </p>
            <hr/>
            <br/>

            <p>
                <label for="name"><span>*</span>Your Name</label> 
                <input name="name" id="name" type="text" value="Your Name" size="17" /> 
            </p>
            
            <p>
                <label for="event"><span>*</span>Your Event</label> 
                <input name="event" id="event" type="text" value="Your Event" size="17" /> 
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
                <label for="des"><span>*</span>Event Description</label> 
                <textarea name="des" id="des" value="Event Description" cols="17"></textarea> 
            </p>
            
            <p>
                <label for="date"><span>*</span>Event Date</label> 
                <input name="date" id="date" type="date" value="Event Date" size="15" ng-model="value"
                       placeholder="yyyy-MM-dd" min="2015-01-01" max="2015-12-31" required/> 
                <span class="error" ng-show="calendar.input.$error.required">
                    Required!</span>
                <span class="error" ng-show="calendar.input.$error.date">
                    Not a valid date!</span>
                <tt>{{value | date: "yyyy-MM-dd"}}</tt><br/>
                <tt>calendar.input.$valid = {{myForm.input.$valid}}</tt><br/>
                <tt>calendar.input.$error = {{myForm.input.$error}}</tt><br/>
                <tt>calendar.$valid = {{myForm.$valid}}</tt><br/>
                <tt>calendar.$error.required = {{!!myForm.$error.required}}</tt><br/>
            </p>

            <p>
                <input name="submit" type="submit" id="mySubmit" class="button" value="Submit" />
                <input name="reset" type="reset" value="Reset" class="button" />
            </p>

            <p><?php echo $message; ?></p>
            <p><?php date_default_timezone_set('CST6CDT'); echo "Today is: " . date('l d/m/y h:i:s A'); ?></p>
        </form>    
    </body>
</html>