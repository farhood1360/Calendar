<?php
/**
 * Name: Calendar App/model/class.CALENDAR.php
 * This class gets day, month, year, and timezone of calendar and then shows the full view of calendar.
 * @author farhoodrashidi
 * @date 12/23/2014
 */

class Calendar {
    
    //properties
    public $content;
    public $message;
    private $time;
    private $day;
    private $month;
    private $year;
    private $nextYear;
    private $preYear;
    private $preYearNav;
    private $nextMonth;
    private $preMonth;
    private $firstDay;
    private $week;
    private $title;
    private $daysCount;
    private $day_count;
    private $dayNum;
    private $blank;
    private $christmas;
    private $newYear;
    private $independence;
    private $halloween;
    
    //construct function
    //@param $d
    //@param $m
    //@param $y
    //@param $timezone
    public function __construct($d = 0, $m = 0, $y = 0, $timezone) {
        $this->time = date_default_timezone_set($timezone);
        if($d == 0){
            $this->day = date("j", $this->time);
        }else{
            $this->day = $d;
        }
        
        if($m == 0){
            $this->month = date("m", $this->time);
        }else{
            $this->month = $m;
        }
 
        if($y == 0){
            $this->year = date("Y", $this->time);
        }else{
            $this->year = $y;
        }
        
        $this->preYearNav = $this->year-1;
        $this->preYear = $this->year;
        $this->nextYear = $this->year;
        $this->preMonth = $this->month-1;
        $this->nextMonth = $this->month+1;
        
        if($this->preMonth ==0){
            $this->preMonth =12;
            $this->preYear--;
        }

        if($this->nextMonth ==13){
            $this->nextMonth =1;
            $this->nextYear++;
        }
        
        $this->firstDay = mktime(0, 0, 0, $this->month, 1 , $this->year);
        $this->title =  date('F', $this->firstDay);
        $this->week = date('D', $this->firstDay);
        
        switch($this->week){
            case "Sun":
                $this->blank = 0;
            break;
            case "Mon":
                $this->blank = 1; 
            break;
            case "Tue":
                $this->blank = 2;
            break; 
            case "Wed":
                $this->blank = 3;
            break;
            case "Thu":
                $this->blank = 4;
            break;
            case "Fri":
                $this->blank = 5; 
            break;
            case "Sat":
                $this->blank = 6;     
            break;   
        }
        $this->daysCount = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);
        $this->day_count = 1;
        $this->dayNum = 1;
        $this->christmas = mktime(0, 0, 0, 12, 25, $this->year);
        $this->newYear = mktime(0, 0, 0, 1, 1, $this->year);
        $this->independence =  mktime(0, 0, 0, 7, 4, $this->year);
        $this->halloween =  mktime(0, 0, 0, 10, 31, $this->year);
        $this->message = date('l', $this->time) . " (" . $this->month . "/" . $this->day .  "/" . $this->year . ")";
    }
    
    //render function
    //@return $content
    public function render(){
        $this->content = "<h2>{$this->year} Calendar</h2>";
        $this->content .= "<div id='calendar' >";
        $this->content .= "<a href=\"{$_SERVER['PHP_SELF']}?year={$this->preYearNav}\" id='preYear'>
                <img src='view/image/pre_year.png' width='40' height='30' alt='previousyear' title='Previous Year'
                    onmouseover=\"this.src='view/image/pre_year_over.png'\" onmouseout=\"this.src='view/image/pre_year.png'\"></a>";
        $this->content .= "<a href=\"{$_SERVER['PHP_SELF']}?year={$this->nextYear}\" id='nextYear'>
                <img src='view/image/next_year.png' width='40' height='30' alt='nextyear' title='Next Year' 
                    onmouseover=\"this.src='view/image/next_year_over.png'\" onmouseout=\"this.src='view/image/next_year.png'\"></a>";
        $this->content .= "<a href=\"{$_SERVER['PHP_SELF']}?month={$this->preMonth}&year={$this->preYear}\" id='pre'>
                <img src='view/image/pre.png' width='30' height='30' alt='previousmonth' title='Previous Month'
                    onmouseover=\"this.src='view/image/pre_over.png'\" onmouseout=\"this.src='view/image/pre.png'\"></a>";
        $this->content .=  "<a href=\"{$_SERVER['PHP_SELF']}?month={$this->nextMonth}&year={$this->nextYear}\" id='next'>
                <img src='view/image/next.png' width='30' height='30' alt='nextmonth' title='Next Month' 
                    onmouseover=\"this.src='view/image/next_over.png'\" onmouseout=\"this.src='view/image/next.png'\"></a>";
        $this->content .= "<h3>{$this->title}</h3><hr/>";
        $this->content .= "<table border='1'><tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr><tr>";
        while($this->blank > 0){
            $this->content .=  "<td></td>"; 
            $this->blank--;
            $this->day_count++;
        }

        while($this->dayNum <= $this->daysCount){ 
            if($this->dayNum == date('j', $this->christmas) && $this->month == 12){
                $this->content .= "<td class='event'> $this->dayNum<br/><b>Christmas</b></td>";
                $this->dayNum++;
                $this->day_count++;
            }else if($this->dayNum == date('j', $this->newYear) && $this->month == 1){
                $this->content .= "<td class='event'> $this->dayNum <br/><b>New Year</b></td>";
                $this->dayNum++;
                $this->day_count++;
            }else if($this->dayNum == date('j', $this->independence) && $this->month == 7){
                $this->content .= "<td class='event'> $this->dayNum <br/><b>Indep Day</b> </td>";
                $this->dayNum++;
                $this->day_count++;
            }else if($this->dayNum == date('j', $this->halloween) && $this->month == 10){
                $this->content .= "<td class='event'> $this->dayNum <br/><b>Halloween</b></td>";
                $this->dayNum++;
                $this->day_count++;
            }else if($this->dayNum == $this->day && $this->month == date('m') && $this->year == date('Y')){
                $this->content .= "<td class='today'>{$this->dayNum}<br/><b><i>Today</i></b></td>";
                $this->dayNum++;
                $this->day_count++;
            }else{
                $this->content .= "<td> $this->dayNum </td>";
                $this->dayNum++;
                $this->day_count++;       
            }

            if($this->day_count > 7){
                $this->content .=  "</tr><tr>"; 
                $this->day_count = 1;    
            }
        }

        while($this->day_count >1 && $this->day_count <=7){ 
            $this->content .=  "<td></td>";
            $this->day_count++; 
        }   
        
        $this->content .= "</tr></table><br/>";
        $this->content .= "<a href=\"{$_SERVER['PHP_SELF']}?today={$this->day}\" id='today'>
                <img src='view/image/today.png' width='50' height='30' alt='today' title='Today'
                    onmouseover=\"this.src='view/image/today_over.png'\" onmouseout=\"this.src='view/image/today.png'\"></a>";
        return $this->content;
    }
    
    //showMessage function
    //@return $message
    public function showMessage(){
        return $this->message;
    }
}

