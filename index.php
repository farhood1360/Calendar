<?php
    /*
    * Name: Calendar App/test.php
    * Author: Farhood Rashidi
    * Date: 11/07/2014
    * This script gets date picked, name and event and then stors on database. 
    */
    
    $name = "";
    $event = "";
    $date = "";
    $message = "&#160;";
    $host = "localhost";
    $username = "root";
    $password = "root";
    if(isset($_POST["submit"]))
    {
        if(!isset($_POST['name']) || !isset($_POST['event']))
        {
            $message = "<p style='color: red'>You must enter your name and event. <br> Click the submit button agian.</p>";
        }
        else
        {
            $name = addslashes($_POST['name']);
            $event = addslashes($_POST['event']);
            $date = addslashes($_POST['date']);
            $link = @mysql_connect($host, $username, $password);
            if($link === FALSE)
            {
                die("Error connecting to data server.");
            }
            $database = "calendar";
            if(@mysql_selectdb($database, $link) === FALSE)
            {
                die("Error selecting database.");
            }
            $table = "event";
            $sqlString ="INSERT INTO $table" . "(name, event, date_picked)" . "VALUES('$name', '$event', '$date')";
            $queryResult = @mysql_query($sqlString , $link);
            if($queryResult === FALSE)
            {
                $message ="<p style='color: red'>Unable to submit right now! Please try again.</p>" . "Error Code: " . mysql_errno($link) . " , " . mysql_error($link);
            }
            else
            {
                $message = $name . " created the event as " . $event . " on " . $date ;
            }
            mysql_close($link);
        }
    }
    if(isset($_POST["reset"]))
    {
        $message = "";
    }
    
    // click function
    function click() {
	echo "Button is clicked.";
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>calendar App</title>
        <link type="text/css" href="test.css" rel="stylesheet"/>
        <script>
		function echoClick(){
		    alert("<?PHP click(); ?>");
		}
	</script>
    </head>

    <body>
        <form id="calendar" action="test.php" name="calendar">
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

            <h3>February</h3>
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
            <br/>

            <p>
                <label for="name"><span>*</span>Your Name</label> 
                <input name="name" id="name" type="text" value="Your Name" size="17" /> 
            </p>

            <p>
              <label for="event"><span>*</span>Your Event</label>
              <select name="event">
                <option>Select One</option>
                <option>Health</option>
                <option>Work</option>
                <option>Enterntaintment</option>
                <option>Home</option>
              </select>
            </p>

            <p>
                <input name="submit" type="submit" id="mySubmit" class="button" value="Submit" />
                <input name="reset" type="reset" value="Reset" class="button" />
            </p>

            <p><?php echo $message; ?></p>
        </form>    
    </body>
</html>
