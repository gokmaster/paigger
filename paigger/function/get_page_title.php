<?php
	if(!isset($_SESSION)){session_start();}
	
// this script is called by pagecreate.php
		
	if(isset($_GET["pageid"]) )
	{
		$page_id = $_GET["pageid"];
				
		require_once "page_functions.php";
				
		if (page_belongs_to_user($page_id) ) {
			echo  page_title($page_id);			
		} 
	}	
?>

