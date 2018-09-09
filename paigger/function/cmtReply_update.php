<?php
	session_start();
	
	include_once "login_first.php";
	
  //retrieve file containing database connection
	include_once "dbconn.php";

	// prepare and bind
	$stmt = $con->prepare("UPDATE p_reply SET reply=? WHERE reply_id=? AND user_id=?");
	$stmt->bind_param("sii", $reply, $reply_id, $user_id); //s = string, d = double, i = integer

	// set parameters and execute
	$reply = $_POST['reply'];
	//Convert all applicable characters to HTML entities to prevent browser from rendering it as html
	$reply = htmlentities($reply, ENT_QUOTES);
	
	$reply_id = $_POST['reply_id'];
	$reply_id = htmlentities($reply_id, ENT_QUOTES);
	
	$user_id = $_SESSION["user_id"];
	
	$stmt->execute();
	$stmt->close();
					
	$con->close();	
	
	//mysqli_close($con);
	
	
?>