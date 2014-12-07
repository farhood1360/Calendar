<?php
/**
* Result Class
* This class shows date, month, and year of calendar.
* @author Farhood Rashidi
* @date 12/03/2014
*/
include 'model/class.php';

$newCalendar = new Calendar();
$newCalendar->setName('2014 Calendar');
echo $newCalendar->getName();
echo "<table border='2'><td>Date</td><td>Month</td><td>Year</td>";
echo "<tr><td>";
$newCalendar->setDate(2);
echo $newCalendar->getDate();
echo"</td><td>";
$newCalendar->setMonth('December');
echo $newCalendar->getMonth();
echo"</td><td>";
$newCalendar->setYear(2014);
echo $newCalendar->getYear();
echo "</td></tr></table>";
$newCalendar->show();

?>
