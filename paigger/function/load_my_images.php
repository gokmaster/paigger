<?php
if(!isset($_SESSION)){session_start();}

 // this php script is called by show_my_images() in page-image-script.js

$onclick_command = "addimage(this)";
include_once './function_load_my_images.php';
load_my_images($onclick_command); // call function to load images
   
?> 

