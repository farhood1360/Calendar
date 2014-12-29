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
    private $_row;
    private $_table;

    //connection() function
    public function connection() {
        $this->_db_connect = mysql_connect(self::DB_HOSTNAME,self::DB_USERNAME,self::DB_PASSWORD) or die(mysql_error());
    }
    
    //select() function
    public function select() {
        mysql_select_db(self::DB_NAME) or die(mysql_error());
    }
    
    //craete() function
    public function create() {
        $this->_table  = "event";
        $this->_sql = "CREATE TABLE {$this->_table} (
          `name` varchar(20) NOT NULL,
          `event` varchar(50) NOT NULL,
          `type` varchar(20) NOT NULL,
          `description` varchar(100) NOT NULL,
          `date_picked` datetime NOT NULL,
          `id` int(11) NOT NULL
        )";
    }
    
    //sql() function
    public function sql(){
        $this->_sql = "SELECT * FROM $this->_table";
    }
    
    //query() function
    public function query(){
        $this->_result = mysql_query($this->_sql);
    }
    
    //fetch_arrray() function
    public function fetch_array(){
        echo "<table width='300px' border='1'>";
        echo "<caption>Event</caption><tr><th>Event</th><th>Type</th><th>Description</th><th>Date</th></tr>";
        while($this->_row = mysql_fetch_array($this->_result)){
            echo "<tr><td>".$this->_row['event']."</td>";
            echo "<td>".$this->_row['type']."</td>";
            echo "<td>".$this->_row['description']."</td>";
            echo "<td>".$this->_row['date_picked']."</td></tr>";
        }
        echo "</table>";
    }

    //destruct() function
    public function disconnect() {
        @mysql_close($this->_db_coonect);
    }
}

