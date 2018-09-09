<?php
	if(!isset($_SESSION)){session_start();}
	
//--------------------------------------------------	
	
		
	function delete_pages()
	{
		//retrieve file containing database connection
		include "dbconn.php";
								
		$logged_in_user = $_SESSION["user_id"];
		
		// prepare and bind
		$stmt = $con->prepare("DELETE FROM page WHERE user_id=?");
		$stmt->bind_param("i", $logged_in_user); //s = string, d = double, i = integer
			
		// execute
		$stmt->execute(); 
		$stmt->close();
		$con->close();
			
	}
	
	function delete_page_likes()
	{
		//retrieve file containing database connection
		include "dbconn.php";
								
		$logged_in_user = $_SESSION["user_id"];
		
		// prepare and bind
		$stmt = $con->prepare("DELETE FROM page_likes WHERE user_id=?");
		$stmt->bind_param("i", $logged_in_user); //s = string, d = double, i = integer
			
		// execute
		$stmt->execute(); 
		$stmt->close();
		$con->close();
			
	}
	
	function delete_join_group_requests()
	{
		//retrieve file containing database connection
		include "dbconn.php";
								
		$logged_in_user = $_SESSION["user_id"];
		
		// prepare and bind
		$stmt = $con->prepare("DELETE FROM pending_join_group WHERE user_id=?");
		$stmt->bind_param("i", $logged_in_user); //s = string, d = double, i = integer
			
		// execute
		$stmt->execute(); 
		$stmt->close();
		$con->close();
			
	}
	
	function delete_comments()
	{
		//retrieve file containing database connection
		include "dbconn.php";
								
		$logged_in_user = $_SESSION["user_id"];
		
		// prepare and bind
		$stmt = $con->prepare("DELETE FROM p_comment WHERE user_id=?");
		$stmt->bind_param("i", $logged_in_user); //s = string, d = double, i = integer
			
		// execute
		$stmt->execute(); 
		$stmt->close();
		$con->close();
			
	}
	
	function delete_follows()
	{
		//retrieve file containing database connection
		include "dbconn.php";
								
		$logged_in_user = $_SESSION["user_id"];
		
		// prepare and bind
		$stmt = $con->prepare("DELETE FROM p_follow WHERE user_id=? OR follower_id=?");
		$stmt->bind_param("ii", $logged_in_user,$logged_in_user); //s = string, d = double, i = integer
			
		// execute
		$stmt->execute(); 
		$stmt->close();
		$con->close();
			
	}
	
	function delete_grp_members()
	{
		//retrieve file containing database connection
		include "dbconn.php";
								
		$logged_in_user = $_SESSION["user_id"];
		
		// prepare and bind
		$stmt = $con->prepare("DELETE FROM p_grp_members WHERE user_id=?");
		$stmt->bind_param("i", $logged_in_user); //s = string, d = double, i = integer
			
		// execute
		$stmt->execute(); 
		$stmt->close();
		$con->close();
			
	}
	
	function delete_images_from_DB()
	{
		//retrieve file containing database connection
		include "dbconn.php";
								
		$logged_in_user = $_SESSION["user_id"];
		
		// prepare and bind
		$stmt = $con->prepare("DELETE FROM p_images WHERE user_id=?");
		$stmt->bind_param("i", $logged_in_user); //s = string, d = double, i = integer
			
		// execute
		$stmt->execute(); 
		$stmt->close();
		$con->close();
			
	}
	
	function delete_images_from_server()
	{
		//retrieve file containing database connection
		include "dbconn.php";
								
		$logged_in_user = $_SESSION["user_id"];
		
		$stmt = mysqli_prepare($con, "SELECT filename FROM p_images WHERE user_id=?");
		
		mysqli_stmt_bind_param($stmt, "i", $logged_in_user); //s = string, d = double, i = integer

		// execute query
		mysqli_stmt_execute($stmt);
		
		//bind the result of that query to variables
		mysqli_stmt_bind_result($stmt, $img_filename);
		
		$deletion_success = true;
		
		while (mysqli_stmt_fetch($stmt) ) {
			// delete image file from server
			if (!unlink('../image/image_uploads/'.$img_filename) ) {
				$deletion_success = false;
			}
			
		}
		
		mysqli_stmt_close($stmt);
		
		return $deletion_success;
			
	}
	
	function delete_replies()
	{
		//retrieve file containing database connection
		include "dbconn.php";
								
		$logged_in_user = $_SESSION["user_id"];
		
		// prepare and bind
		$stmt = $con->prepare("DELETE FROM p_reply WHERE user_id=?");
		$stmt->bind_param("i", $logged_in_user); //s = string, d = double, i = integer
			
		// execute
		$stmt->execute(); 
		$stmt->close();
		$con->close();
			
	}
	
	function delete_user_account()
	{
		//retrieve file containing database connection
		include "dbconn.php";
								
		$logged_in_user = $_SESSION["user_id"];
		
		// prepare and bind
		$stmt = $con->prepare("DELETE FROM p_user WHERE user_id=?");
		$stmt->bind_param("i", $logged_in_user); //s = string, d = double, i = integer
		
		$deletion_success = false;
		
		// execute
		if ($stmt->execute() ) {
			$deletion_success = true;
		}
		$stmt->close();
		$con->close();
		
		return $deletion_success;
			
	} 
	
	 
?>