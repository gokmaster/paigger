<?php
	if(!isset($_SESSION)){session_start();}
	
	if(isset($_SESSION["user_id"]) )
	{
	  //retrieve file containing database connection
		require_once "dbconn.php";
				
		// mysqli prepared statements is used to prevent sql injection
		// prepare and bind
		$stmt = $con->prepare("INSERT INTO page (page_title, content, user_id) VALUES (?,?,?)");
		$stmt->bind_param("ssi", $title, $content, $user_id); //s = string, d = double, i = integer

		// set parameters and execute
		$title = $_POST['pagetitle'];
		//Convert all applicable characters to HTML entities to prevent browser from rendering it as html
		$title = htmlentities($title, ENT_QUOTES); 
		//$title = filter_var($title, FILTER_SANITIZE_STRING); // remove all HTML tags from string
		
		$content = $_POST['pagecontent'];
				
		$user_id = $_SESSION["user_id"];
		
		$stmt->execute();
		$stmt->close();
		
		require_once "page_functions.php";
		$current_page = latest_page_id();
		
		echo $current_page;

		
		$con->close();	
		
		//mysqli_close($con);
	
	} //if
?>