<?php
	session_start();
	
	include_once "login_first.php"; // redirect user to login page if not already logged-in
	
  //retrieve file containing database connection
	require_once "dbconn.php";

	// prepare and bind
	$stmt = $con->prepare("INSERT INTO p_reply (reply, user_id, comment_id) VALUES (?,?,?)");
	$stmt->bind_param("sii", $reply, $user_id, $comment_id); //s = string, d = double, i = integer

	// set parameters and execute
	$reply = $_POST['reply'];
	//Convert all applicable characters to HTML entities to prevent browser from rendering it as html
	$reply = htmlentities($reply, ENT_QUOTES);
	
	$user_id = $_SESSION["user_id"];
	
	$comment_id = $_POST['comment_id'];
	$comment_id = htmlentities($comment_id, ENT_QUOTES);
	
	
	$stmt->execute();
	$stmt->close();
					
	$con->close();	
	
	//mysqli_close($con);	
?>