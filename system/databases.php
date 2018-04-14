<?php
/* 
 * *****************************************************************************
 * Filename  : databases.php                                                    
 * Creator   : IBeESNay                                    
 * © Copyright and Powered by IBeESNay                         
 * *****************************************************************************
 */
class Databases {
    // Properti class
    var $hostname   = "localhost";        // Nama host atau server
    var $username   = "root";     // Username database
    var $password   = "";         // Password database
    var $database   = "apps_jadwal";      // Nama database
    
    public function __construct() {
        mysql_connect($this->hostname, $this->username, $this->password);
        mysql_select_db($this->database);
    }
    /* end of class Databases */
}

