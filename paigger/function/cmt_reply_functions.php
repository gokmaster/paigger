<?php
	session_start();
	
//--------------------------------------------------	
	
	function reply_belongs_to_user($reply_id)
	{
		//retrieve file containing database connection
		include "dbconn.php";
		
		$user_id = $_SESSION["user_id"];
		
		// prepare and bind
		$stmt = mysqli_prepare($con, "SELECT COUNT(reply_id) AS num FROM p_reply WHERE user_id = ? AND reply_id = ?");
		mysqli_stmt_bind_param($stmt, "ii", $user_id, $reply_id); //s = string, d = double, i = integer
		
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
	
	
	
	 
?>