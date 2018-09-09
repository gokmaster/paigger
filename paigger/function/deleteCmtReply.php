<?php
	session_start();
		
	include_once "login_first.php";
		
  //retrieve file containing database connection
	include "dbconn.php";
	//include_once "comment_functions.php";
						
	$cmtReply_id = $_POST['cmtReply_id']; 
	$logged_in_user = $_SESSION["user_id"];
	

	// prepare and bind
	$stmt = $con->prepare("DELETE FROM p_reply WHERE reply_id=? AND user_id=?");
	$stmt->bind_param("ii", $cmtReply_id,$logged_in_user); //s = string, d = double, i = integer
		
	// execute
	if ($stmt->execute()) {
		
		$stmt->close();
		$con->close();
		
		echo "
		This reply has been deleted.
		
		";
	} else { echo "Could not delete reply"; } 
		
			 
	
?> 