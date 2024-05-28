<?php

namespace gpApp\db;

// Connect to database
class dbConn {

    private $host = "server239.web-hosting.com";
    private $user = "gokpstuw_root";
    private $password = "dOo6(j.@^trS";
    private $database = "gokpstuw_paigger";

    
    // localhost
    /* private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "paigger_db"; */
    

    function connect() {
    // connect to database
        $con = mysqli_connect($this->host,$this->user,$this->password,$this->database);

        // Check connection
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        return $con;

    }

}
  
?>