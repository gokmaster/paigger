<?php
	session_start();
	
	include_once "login_first.php";
	
  //retrieve file containing database connection
	include_once "dbconn.php";

	// prepare and bind
	$stmt = $con->prepare("UPDATE p_comment SET comment=? WHERE comment_id=? AND user_id=?");
	$stmt->bind_param("sii", $comment, $comment_id, $user_id); //s = string, d = double, i = integer

	// set parameters and execute
	$comment = $_POST['comment'];
	
	$comment_id = $_POST['comment_id'];
	//Convert all applicable characters to HTML entities to prevent browser from rendering it as html
	$comment_id = htmlentities($comment_id, ENT_QUOTES);
	
	$user_id = $_SESSION["user_id"];
	
	$stmt->execute();
	$stmt->close();
					
	$con->close();	
	
	//mysqli_close($con);
	
	
?>