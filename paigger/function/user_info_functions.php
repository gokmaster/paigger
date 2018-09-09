<?php
	if(!isset($_SESSION)){session_start();}
		
	function fname($user_id)
	{	
		//retrieve file containing database connection
		include "dbconn.php";
		
		// prepare and bind
		$stmt2 = mysqli_prepare($con, "SELECT fname FROM p_user WHERE user_id = ? ");
		mysqli_stmt_bind_param($stmt2, "i", $user_id); //s = string, d = double, i = integer

		// execute query
		mysqli_stmt_execute($stmt2);
				
		//bind the result of that query to variables
		mysqli_stmt_bind_result($stmt2, $fname);
		
		mysqli_stmt_fetch($stmt2);
		
		mysqli_stmt_close($stmt2);
		
		return $fname;
	} 

//--------------------------------------------------	

	function lname($user_id)
	{	
		//retrieve file containing database connection
		include "dbconn.php";
		
		// prepare and bind
		$stmt2 = mysqli_prepare($con, "SELECT lname FROM p_user WHERE user_id = ? ");
		mysqli_stmt_bind_param($stmt2, "i", $user_id); //s = string, d = double, i = integer

		// execute query
		mysqli_stmt_execute($stmt2);
				
		//bind the result of that query to variables
		mysqli_stmt_bind_result($stmt2, $lname);
		
		mysqli_stmt_fetch($stmt2);
		
		mysqli_stmt_close($stmt2);
		
		return $lname;
	} 
	
//--------------------------------------------------	

	function profile_pic($user_id)
	{	
		//retrieve file containing database connection
		include "dbconn.php";
		
		// prepare and bind
		$stmt2 = mysqli_prepare($con, "SELECT profile_pic FROM p_user WHERE user_id = ? ");
		mysqli_stmt_bind_param($stmt2, "i", $user_id); //s = string, d = double, i = integer

		// execute query
		mysqli_stmt_execute($stmt2);
				
		//bind the result of that query to variables
		mysqli_stmt_bind_result($stmt2, $profile_pic);
		
		mysqli_stmt_fetch($stmt2);
		
		mysqli_stmt_close($stmt2);
		
		return $profile_pic;
	} 
	
//------------------------------
	
	function cover_photo($user_id)
	{	
		//retrieve file containing database connection
		include "dbconn.php";
		
		// prepare and bind
		$stmt2 = mysqli_prepare($con, "SELECT cover_photo FROM p_user WHERE user_id = ? ");
		mysqli_stmt_bind_param($stmt2, "i", $user_id); //s = string, d = double, i = integer

		// execute query
		mysqli_stmt_execute($stmt2);
				
		//bind the result of that query to variables
		mysqli_stmt_bind_result($stmt2, $pic);
		
		mysqli_stmt_fetch($stmt2);
		
		mysqli_stmt_close($stmt2);
		
		return $pic;
	}
	
	 
?>