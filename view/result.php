<?php
/**
 * Name: Calendar App/view/result.php
 * This class gets date and month and year of calendar.
 * @author farhoodrashidi
 * @date 12/04/2014
 */

include '../model/class.php';
include '../model/database.php';

$newCalendar = new Calendar();
$newCalendar->setName('2015 Calendar');
echo "<header><title>Calendar:: Result</title>";
echo "<link type='text/css' href='css/calendar.css' rel='stylesheet'/></header><body><h2>";
echo $newCalendar->getName();
echo "</h2></br>";
echo "<table width='200px' border='1'><td>Order</td><td>Date</td><td>Month</td><td>Year</td>";
echo "<tr><td valign='top'>";
date_default_timezone_set('CST6CDT');
$newCalendar->setDate(date('D'));
echo $newCalendar->getDate();
echo"</td><td>";
$newCalendar->setDate(date('d'));
echo $newCalendar->getDate();
echo"</td><td>";
$newCalendar->setMonth(date('M'));
echo $newCalendar->getMonth();
echo"</td><td>";
$newCalendar->setYear(date('Y'));
echo $newCalendar->getYear();
echo "</td></tr></table>";
echo"<br/><p>";
$newCalendar->show();
echo"</p><br/><br/>";

session_start();
$newDatabae = new Database();
$newDatabae->name= $_SESSION["name"];
$newDatabae->connection();
$newDatabae->select();
$newDatabae->sql();
$newDatabae->query();
$newDatabae->fetch_array();
$newDatabae->disconnect();
session_destroy();


