<?php
	session_start();
	
	if(isset($_SESSION["user_id"]) )
	{
	  //retrieve file containing database connection
		require_once "dbconn.php";
		require_once "page_functions.php";
					
		$current_page = $_POST['page_id'];
		//Convert all applicable characters to HTML entities to prevent browser from rendering it as html
		$current_page = htmlentities($current_page, ENT_QUOTES);
		
		$audience = $_POST['page_audience'];
		$audience = htmlentities($audience, ENT_QUOTES);
		
		$user_id = $_SESSION["user_id"];
		
		if (page_belongs_to_user($current_page) ) {
			// prepare and bind
			$stmt = $con->prepare("UPDATE page SET audience=? WHERE user_id=? AND pageid=?");
			$stmt->bind_param("sii", $audience, $user_id, $current_page); //s = string, d = double, i = integer
			
			if ($stmt->execute() ) {
			 echo "
			 Successfully updated page audience.
			<script>
				window.location.href = './pageview.php?pageid=$current_page';
			</script>
			";
			}
			$stmt->close();
			$con->close();
			
		}
	
	} //if
?>