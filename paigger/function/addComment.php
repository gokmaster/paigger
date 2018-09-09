<?php
	session_start();
	
	include_once "login_first.php"; // redirect user to login page if not already logged-in
	
  //retrieve file containing database connection
	require_once "dbconn.php";

	// prepare and bind
	$stmt = $con->prepare("INSERT INTO p_comment (comment, user_id, page_id) VALUES (?,?,?)");
	$stmt->bind_param("sii", $comment, $user_id, $page_id); //s = string, d = double, i = integer

	// set parameters and execute
	$comment = $_POST['comment'];
	
	$user_id = $_SESSION["user_id"];
	
	$page_id = $_POST['page_id'];
	//Convert all applicable characters to HTML entities to prevent browser from rendering it as html
	$page_id = htmlentities($page_id, ENT_QUOTES);
	
	
	$stmt->execute();
	$stmt->close();
					
	$con->close();	
	
	//mysqli_close($con);
	
	
?>