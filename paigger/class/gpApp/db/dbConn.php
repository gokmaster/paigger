<?php

namespace gpApp\db;

// Connect to database
class dbConn {

    private $host = "pdb18.runhosting.com";
    private $user = "2093962_goxpc";
    private $password = "g1o1k1s1i1n1g";
    private $database = "2093962_goxpc";

    
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