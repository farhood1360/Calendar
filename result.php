<?php
session_start();
include 'class.php';

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
