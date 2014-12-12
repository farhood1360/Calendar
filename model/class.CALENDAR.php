<?php
/**
 * Name: Calendar App/model/class.CALENDAR.php
 * Calendar Class
 * This class gets day, month, and year or date of calendar.
 * @author farhoodrashidi
 * @date 12/02/2014
 */

class Calendar {
    
    private $name;
    private $date;
    private $day;
    private $month = array(January, February, March, April, June, July, Auguast, September, October, November, December);
    private $year;
    
    //Construct function
    public function __construct($name, $date, $day, $month, $year) {
        $this->name= $name;
        $this->date= $date;
        $this->day = $day;
        $this->month= $month;
        $this->year= $year;
    }
    
    //setName() function
    //@param $name
    public function setName($name){
        $this->name = $name;
    }
    
    //getName() function
    //@return $name
    public function getName(){
        return $this->name;
    }
    
    //setDate() function
    //@param $date
    public function setDate($date){
        $this->date = $date;
    }
    
    //getDate() function
    //@return $date
    public function getDate(){
        return $this->date;
    }
    
    //setDay() function
    //@param $day
    public function setDay($day){
        $this->day = $day;
    }
    
    //getDay() function
    //@return $day
    public function getDay(){
        return $this->day;
    }
    
    //setMonth() function
    //@param $month
    public function setMonth($month){
        $this->month = $month;
    }
    
    //getMonth() function
    //@return $month
    public function getMonth(){
        return $this->month;
    }
    
    //setYear() function
    //@param $year
    public function setYear($year){
        $this->year = $year;
    }
    
    //getYear() function
    //@return $year
    public function getYear(){
        return $this->year;
    }
}

