<?php

// autoload classes
include_once  __DIR__ . "/../class/vendor/autoload.php";

use gpApp\db\dbConn as dbConn;

// connect to database
$db = new dbConn();
$con = $db->connect();
  
?>