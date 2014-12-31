<?php
/**
 * Name: Calendar App/database.php
 * This class configurates the database connection.
 * @author Farhood Rashidi
 * @date 12/28/2014
 */

class Database {

    const DB_HOSTNAME = 'localhost';
    const DB_USERNAME = 'username';
    const DB_PASSWORD = 'password';
    const DB_NAME = 'calendar';
    private $_db_connect;
    private $_sql;
    private $_result;
    private $_name;

    //connection() function
    public function connection() {
        $this->_db_connect = mysql_connect(self::DB_HOSTNAME,self::DB_USERNAME,self::DB_PASSWORD) or die(mysql_error());
    }
    
    //select() function
    public function select() {
        mysql_select_db(self::DB_NAME) or die(mysql_error());
    }
    
    //sql() function
    public function sql($name){
        $this->name = $name;
        $this->_sql = "SELECT event, description, type, time_picked FROM event WHERE name='{$this->_name}'";
    }
    
    //query() function
    public function query(){
        $this->_result = mysql_query($this->_sql);
    }

    //destruct() function
    public function disconnect() {
        @mysql_close($this->_db_coonect);
    }
}

