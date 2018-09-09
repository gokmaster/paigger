<?php
	if(!isset($_SESSION)){session_start();}
	
	// fetch page_id of user's latest page
	function latest_page_id()
	{
		//retrieve file containing database connection
		include "dbconn.php";
		
		$user_id = $_SESSION["user_id"];
		
		// prepare and bind
		$stmt = mysqli_prepare($con, "SELECT MAX(pageid) AS latestPageID FROM page WHERE user_id = ?");
		mysqli_stmt_bind_param($stmt, "i", $user_id); //s = string, d = double, i = integer
		
		// execute query
		mysqli_stmt_execute($stmt);
	
		//bind the result of that query to variables
		mysqli_stmt_bind_result($stmt, $page_id);
			
		mysqli_stmt_fetch($stmt);
		
		mysqli_stmt_close($stmt);
		//mysqli_close($con);
		
		return $page_id;
	} 
	
	
	function page_audience($page_id)
	{
		//retrieve file containing database connection
		include "dbconn.php";
				
		// prepare and bind
		$stmt = mysqli_prepare($con, "SELECT audience FROM page WHERE pageid = ?");
		mysqli_stmt_bind_param($stmt, "i", $page_id); //s = string, d = double, i = integer
		
		// execute query
		mysqli_stmt_execute($stmt);
	
		//bind the result of that query to variables
		mysqli_stmt_bind_result($stmt, $page_audience);
			
		mysqli_stmt_fetch($stmt);
		
		mysqli_stmt_close($stmt);
		//mysqli_close($con);
		
		return $page_audience;
	}
	
	function page_title($page_id)
	{
		//retrieve file containing database connection
		include "dbconn.php";
				
		// prepare and bind
		$stmt = mysqli_prepare($con, "SELECT page_title FROM page WHERE pageid = ?");
		mysqli_stmt_bind_param($stmt, "i", $page_id); //s = string, d = double, i = integer
		
		// execute query
		mysqli_stmt_execute($stmt);
			
		//bind the result of that query to variables
		mysqli_stmt_bind_result($stmt, $page_title);
			
		mysqli_stmt_fetch($stmt);
		
		mysqli_stmt_close($stmt);
		//mysqli_close($con);
		
		return $page_title;
	}
	
	
	function page_content($page_id)
	{
		//retrieve file containing database connection
		include "dbconn.php";
				
		// prepare and bind
		$stmt = mysqli_prepare($con, "SELECT content FROM page WHERE pageid = ?");
		mysqli_stmt_bind_param($stmt, "i", $page_id); //s = string, d = double, i = integer
		
		// execute query
		mysqli_stmt_execute($stmt);
		
		// store result (this is needed in order for longtext field to not be empty when binded to variable)
		mysqli_stmt_store_result($stmt);
	
		//bind the result of that query to variables
		mysqli_stmt_bind_result($stmt, $page_content);
			
		mysqli_stmt_fetch($stmt);
		
		mysqli_stmt_close($stmt);
		//mysqli_close($con);
		
		return $page_content;
	}

//--------------------------------------------------	
	
	function page_belongs_to_user($page_id)
	{
		//retrieve file containing database connection
		include "dbconn.php";
		
		$user_id = $_SESSION["user_id"];
		
		// prepare and bind
		$stmt = mysqli_prepare($con, "SELECT COUNT(pageid) AS num FROM page WHERE user_id = ? AND pageid = ?");
		mysqli_stmt_bind_param($stmt, "ii", $user_id, $page_id); //s = string, d = double, i = integer
		
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