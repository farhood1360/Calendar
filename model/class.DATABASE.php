<?php
/**
 * Name: Calendar App/database.php
 * This class configurates the database connection.
 * @author Farhood Rashidi
 * @date 01/06/2015
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
    private $_sql;

    //connection() function
    public function connection() {
        $this->_db_connect = mysql_connect(self::DB_HOSTNAME,self::DB_USERNAME,self::DB_PASSWORD) or die(mysql_error());
    }
    
    //select() function
    public function select() {
        mysql_select_db(self::DB_NAME) or die(mysql_error());
    }
       
    //insert() function
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
    public function query(){
        $this->select = "SELECT event, description, date_picked, time_picked FROM event";
        $this->_sql = mysql_query($this->select);
    }

    //destruct() function
    public function disconnect() {
        @mysql_close($this->_db_coonect);
    }
}

