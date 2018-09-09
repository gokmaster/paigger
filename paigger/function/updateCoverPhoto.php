<?php
	session_start();
	
	if(isset($_SESSION["user_id"]) )
	{
	  //retrieve file containing database connection
		include "dbconn.php";
		
		// prepare and bind
		$stmt = $con->prepare("UPDATE p_user SET cover_photo=? WHERE user_id=?");
		$stmt->bind_param("si", $image, $user_id); //s = string, d = double, i = integer

		// set parameters and execute
		$image = $_POST['imagefile'];
		$user_id = $_SESSION["user_id"];
		
		$stmt->execute();

		$stmt->close();
		$con->close();	
		
		//mysqli_close($con);
	
	} //if
?>