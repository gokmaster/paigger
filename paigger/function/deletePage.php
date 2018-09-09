<?php
	session_start();
		
	// if not logged-in
	if(!isset($_SESSION["user_id"]) ) {
		echo "You need to login first.
		<br>
		<button onclick=hideDeletePageDialogBox() >Close</button>";
		exit();
	}
		
  //retrieve file containing database connection
	require_once "dbconn.php";
	require_once "page_functions.php";
						
	$page_id = $_POST['page_id']; 
	$logged_in_user = $_SESSION["user_id"];
	
	if (page_belongs_to_user($page_id) ) { 
		// prepare and bind
		$stmt = $con->prepare("DELETE FROM page WHERE pageid=? AND user_id=?");
		$stmt->bind_param("ii", $page_id,$logged_in_user); //s = string, d = double, i = integer
			
		// execute
		if ($stmt->execute()) {
			
			$stmt->close();
			$con->close();
			
			echo "
			This page has been deleted.
			
			<script>
				window.location.href = './mypages.php';
			</script>
			";
		} 
	}
		 
	
?> 