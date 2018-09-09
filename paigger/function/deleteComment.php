<?php
	session_start();
		
	include_once "login_first.php";
		
  //retrieve file containing database connection
	include "dbconn.php";
	//include_once "comment_functions.php";
						
	$comment_id = $_POST['comment_id']; 
	$logged_in_user = $_SESSION["user_id"];
	

	// prepare and bind
	$stmt = $con->prepare("DELETE FROM p_comment WHERE comment_id=? AND user_id=?");
	$stmt->bind_param("ii", $comment_id,$logged_in_user); //s = string, d = double, i = integer
		
	// execute
	if ($stmt->execute()) {
		
		$stmt->close();
		$con->close();
		
		echo "
		This comment has been deleted.
		
		";
	} else { echo "Could not delete comment"; } 
		
			 
	
?> 