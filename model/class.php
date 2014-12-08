<?php
/**
 * Calendar Class
 * This class gets date and month and year of calendar.
 * @author farhoodrashidi
 * @date 12/03/2014
 */

class Calendar {
    
    private $name;
    private $date;
    private $month = array(January, February, March, April, June, July, Auguast, September, October, November, December);
    private $year;
    
    //Construct function
    public function __construct($name, $date, $month, $year) {
        $this->name= $name;
        $this->date= $date;
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
    
    //show() function
    public function show(){
        "Today is : " . $this->date . ", " . $this->month . ", " . $this->year;
    }
}

