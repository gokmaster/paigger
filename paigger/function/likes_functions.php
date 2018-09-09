<?php
	if(!isset($_SESSION)){session_start();}
	
	// has user already liked page?
	function already_liked($page_id)
	{
		//retrieve file containing database connection
		include "dbconn.php";
		
		$user_id = $_SESSION["user_id"];
		
		// prepare and bind
		$stmtfl = mysqli_prepare($con, "SELECT COUNT(pagelike_id) AS num FROM page_likes WHERE user_id = ? AND page_id = ?");
		mysqli_stmt_bind_param($stmtfl, "ii", $user_id,$page_id); //s = string, d = double, i = integer

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
	
	function num_likes($page_id)
	{
		//retrieve file containing database connection
		include "dbconn.php";
		
		// prepare and bind
		$stmtNum = mysqli_prepare($con, "SELECT COUNT(pagelike_id) AS num FROM page_likes WHERE page_id = ? ");
	
		mysqli_stmt_bind_param($stmtNum, "i", $page_id); //s = string, d = double, i = integer

		// execute query
		mysqli_stmt_execute($stmtNum);
		
		//bind the result of that query to variables
		mysqli_stmt_bind_result($stmtNum, $num);
		
		mysqli_stmt_fetch($stmtNum);
		
		mysqli_stmt_close($stmtNum);
		
		return $num;
	
	} 

//--------------------------------------------
	
	 
?>