<?php
	if(!isset($_SESSION)){session_start();}
		
	function already_following($user_id)
	{
		//retrieve file containing database connection
		include "dbconn.php";
		
		$follower_id = $_SESSION["user_id"];
		
		// prepare and bind
		$stmtfl = mysqli_prepare($con, "SELECT COUNT(follower_id) AS num FROM p_follow WHERE user_id = ? AND follower_id = ?");
		mysqli_stmt_bind_param($stmtfl, "ii", $user_id,$follower_id); //s = string, d = double, i = integer

		// execute query
		mysqli_stmt_execute($stmtfl);
		
		//bind the result of that query to variables
		mysqli_stmt_bind_result($stmtfl, $num);
		
		mysqli_stmt_fetch($stmtfl);		
		
		mysqli_stmt_close($stmtfl);
		//mysqli_close($con);
		
		if ($num > 0) 
		{
			return true; 
		} else 
		{
			return false;
		}
				
	} 

//------------------------------------------------	
	
	function num_followers($user_id)
	{
		//retrieve file containing database connection
		include "dbconn.php";
		
		// Get number of followers
		// prepare and bind
		$stmtNum = mysqli_prepare($con, "SELECT COUNT(follower_id) AS num_followers FROM p_follow WHERE user_id = ? ");
		
		// $user_id here is referring to the user you want to follow, Not the user who is signed-in
		mysqli_stmt_bind_param($stmtNum, "i", $user_id); //s = string, d = double, i = integer

		// execute query
		mysqli_stmt_execute($stmtNum);
		
		//bind the result of that query to variables
		mysqli_stmt_bind_result($stmtNum, $num);
		
		mysqli_stmt_fetch($stmtNum);
		
		mysqli_stmt_close($stmtNum);
		
		return $num;
	
	} 

//--------------------------------------------
	
	function users_you_following($follower_id)
	{
		//retrieve file containing database connection
		include "dbconn.php";
				
		// prepare and bind
		$stmt = mysqli_prepare($con, "SELECT user_id FROM p_follow WHERE follower_id = ? LIMIT 500");
		
		mysqli_stmt_bind_param($stmt, "i", $follower_id); //s = string, d = double, i = integer

		// execute query
		mysqli_stmt_execute($stmt);
		
		//bind the result of that query to variables
		mysqli_stmt_bind_result($stmt, $following_user_id);
		
		$count = 0;
		$user_array = array();
		
		while (mysqli_stmt_fetch($stmt) ) {
			$user_array[] = $following_user_id;
			$count = $count + 1;
		}
		
		mysqli_stmt_close($stmt);
		
		if ($count > 0) 
		{
			return $user_array;
		} else {
			return false;
		}
	
	} 
	 
?>