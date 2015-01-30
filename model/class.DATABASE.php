<?php
/**
 * Name: Calendar App/model/database.php
 * This class configurates the database connection.
 * @author Farhood Rashidi
 * @date 01/01/2015
 */

class Database {

    //properties
    const DB_HOSTNAME = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = 'root';
    const DB_NAME = 'calendar';
    private $_db_connect;
    private $select;
    private $insert;
    private $result;
    private $record;
    private $_sql;

    //connection() function
    //Craete the database configuration
    public function connection() {
        $this->_db_connect = mysql_connect(self::DB_HOSTNAME,self::DB_USERNAME,self::DB_PASSWORD) or die(mysql_error());
    }
    
    //select() function
    //Create a connection to database
    public function select() {
        mysql_select_db(self::DB_NAME) or die(mysql_error());
    }
       
    //insert() function
    //Insert the new records to event table.
    //@param $name
    //@param $event
    //@param $type
    //@param $description
    //@param $date
    //@param $time
    public function insert($name, $event, $type, $description, $date, $time){
        try{
            $this->insert = "INSERT INTO event(name, event, type, description, date_picked, time_picked) VALUES('{$name}', '{$event}', '{$type}', '{$description}', '{$date}', '{$time}')";
        $this->_sql = mysql_query($this->insert);
        } catch (Exception $e) {
            echo "There is a problem on insertion to database! Please try again. " . $e->getMessage();
            exit();
        }
    }
    
    //query() function
    //Select the filtered records of database.
    //@param $date
    public function query($date){
        $this->select = "SELECT event, type, description FROM event WHERE date_picked = '{$date}'";
        $this->result = mysql_query($this->select);
        if($this->result === FALSE){die("Error querying database.");}
        while(($this->record = mysql_fetch_row($this->result)) !== FALSE){
            echo $this->record[0].", ".$this->record[1].", ".$this->record[2];
        }
    }

    //destruct() function
    // Disconnect form the database.
    public function disconnect() {
        @mysql_close($this->_db_coonect);
    }
}

