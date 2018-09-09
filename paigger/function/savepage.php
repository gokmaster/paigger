<?php
	session_start();
	
	// if not logged in
	if(!isset($_SESSION["user_id"]) ) {
		exit();
	}
	
	// if pageid is not set
	if (!isset($_POST['pageid']) ) {
		exit();
	} 
	
	$page_id = $_POST['pageid'];
										
  //retrieve file containing database connection
	require_once "dbconn.php";
			
	// prepare and bind
	$stmt = $con->prepare("UPDATE page SET page_title=?,content=?  WHERE pageid=? AND user_id=?");
	$stmt->bind_param("ssii", $title, $content, $page_id, $user_id); //s = string, d = double, i = integer

	// set parameters and execute
	$title = $_POST['pagetitle'];
	//Convert all applicable characters to HTML entities to prevent browser from rendering it as html
	$title = htmlentities($title, ENT_QUOTES); 
	//$title = filter_var($title, FILTER_SANITIZE_STRING); // remove all HTML tags from string
		
	$content = $_POST['pagecontent'];
	
	$user_id = $_SESSION['user_id'];
	
	$stmt->execute();
	$stmt->close();
		
	$con->close();	
	
	//mysqli_close($con);
	
?>