<?php
/**
 * Name: Calendar App/database.php
 * This class configurates the database connection.
 * @author Farhood Rashidi
 * @date 12/03/2014
 */

class Database {

    const DB_HOSTNAME = 'localhost';
    const DB_USERNAME = 'admin';
    const DB_PASSWORD = 'password';
    const DB_NAME = 'calendar';
    protected $_db_connect;
    protected $_sql;
    protected $_result;
    protected $_row;
    protected $_table = "event";
    public $name;

    //connection() function
    public function connection() {
        $this->_db_connect = mysql_connect(self::DB_HOSTNAME,self::DB_USERNAME,self::DB_PASSWORD) or die(mysql_error());
    }
    
    //select() function
    public function select() {
        mysql_select_db(self::DB_NAME) or die(mysql_error());
    }
    
    //sql() function
    public function sql(){
        $this->_sql = "SELECT * FROM $this->_table WHERE name='$this->name'";
    }
    
    //query() function
    public function query(){
        $this->_result = mysql_query($this->_sql);
    }
    
    //fetch_arrray() function
    public function fetch_array(){
        echo "<table width='300px' border='1'>";
        echo "<caption>Result</caption><tr><th>Name</th><th>Event</th><th>Date</th><th>ID</th></tr>";
        while($this->_row = mysql_fetch_array($this->_result)){
                echo "<tr><td>".$this->_row['name']."</td>";
                echo "<td>".$this->_row['event']."</td>";
                echo "<td>".$this->_row['date_picked']."</td>";
                echo "<td>".$this->_row['id']."</td></tr>";
        }
        echo "</table>";
    }

    //destruct() function
    public function disconnect() {
        @mysql_close($this->_db_coonect);
    }
}

