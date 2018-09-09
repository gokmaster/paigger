<?php
	if(!isset($_SESSION)){session_start();}
	
//--------------------------------------------------	
	
		
	function pword_from_DB()
	{
		//retrieve file containing database connection
		include "dbconn.php";
								
		$logged_in_user = $_SESSION["user_id"];
		
		// prepare and bind
		$stmt = $con->prepare("SELECT pword FROM p_user WHERE user_id = ?");
		$stmt->bind_param("i", $logged_in_user); //s = string, d = double, i = integer
			
		// execute
		$stmt->execute(); 
		
		//bind the result of that query to variables
		$stmt->bind_result($pword);
		
		$pword_in_DB = "";
		
		while($stmt->fetch()) {
			$pword_in_DB = $pword;
		}
		
		$stmt->close();
		$con->close();
		
		return $pword_in_DB;
			
	}
	
	
	 
?>