<?php
/**
 * Name: Calendar App/model/class.EVENT.php
 * This class creates an event object includes name, type, description, type, date, and time.
 * @author Farhood Rashidi
 * @date 01/01/2015
 */

include 'class.DATABASE.php';

class Event extends Database{
    
    //properties
    private $name;
    private $event;
    private $type;
    private $description;
    private $date;
    private $time;
    private $message;
    
    //construct function
    //@param $name
    //@param $event
    //@param $type
    //@param $description
    //@param $date
    //@param $time
    public function __construct($name, $event, $type, $description, $date, $time) {
        parent::connection();
        parent::select();
        $this->name = $name;
        $this->event = $event;
        $this->type = $type;
        $this->description = $description;
        $this->date = $date;
        $this->time = $time;
        $this->insert($this->name, $this->event, $this->type, $this->description, $this->date, $this->time);
        $this->message = $this->event . ": ". $this->description .", " . $this->date . "/ " . $this->time;
    }
    
    //showMessage function
    //@return $message
    public function showMessage(){
        return $this->message;
    }
    
    //destruct() function
    // Disconnect form the database.
    public function disconnect() {
        parent::disconnect();
    }
}
