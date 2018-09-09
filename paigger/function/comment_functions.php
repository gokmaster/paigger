<?php
	if(!isset($_SESSION)){session_start();}
	
//--------------------------------------------------	
	
	function comment_belongs_to_user($comment_id)
	{
		//retrieve file containing database connection
		include "dbconn.php";
		
		$user_id = $_SESSION["user_id"];
		
		// prepare and bind
		$stmt = mysqli_prepare($con, "SELECT COUNT(comment_id) AS num FROM p_comment WHERE user_id = ? AND comment_id = ?");
		mysqli_stmt_bind_param($stmt, "ii", $user_id, $comment_id); //s = string, d = double, i = integer
		
		// execute query
		mysqli_stmt_execute($stmt);
	
		//bind the result of that query to variables
		mysqli_stmt_bind_result($stmt, $num);
			
		mysqli_stmt_fetch($stmt);
		
		mysqli_stmt_close($stmt);
		//mysqli_close($con);
		
		if ($num > 0) {
			return true;
		} else {
			return false;
		}
	} 
	
	
	function get_comment($comment_id)
	{
		//retrieve file containing database connection
		include "dbconn.php";
				
		// prepare and bind
		$stmt = mysqli_prepare($con, "SELECT comment FROM p_comment WHERE comment_id = ?");
		mysqli_stmt_bind_param($stmt, "i", $comment_id); //s = string, d = double, i = integer
		
		// execute query
		mysqli_stmt_execute($stmt);
		
		// store result (this is needed in order for longtext field to not be empty when binded to variable)
		mysqli_stmt_store_result($stmt);
	
		//bind the result of that query to variables
		mysqli_stmt_bind_result($stmt, $comment);
			
		mysqli_stmt_fetch($stmt);
		
		mysqli_stmt_close($stmt);
		//mysqli_close($con);
		
		return $comment;
	}
	
	 
?>