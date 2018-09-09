<?php
	session_start();
	
	include_once "login_first.php";
	
  //retrieve file containing database connection
	require_once "dbconn.php";
		
	require_once "group_functions.php";
	
	$grp_id = $_POST['group_id']; 
	$user_id = $_SESSION["user_id"];
	$status = "pending";
	
	// if join-group request already made before
	if (join_group_status($grp_id,$user_id) == $status ) {
		exit();
	}
	
	//if not a group member
	if (!user_is_grp_member($grp_id,$user_id) ) { 
		// prepare and bind
		$stmt = $con->prepare("INSERT INTO pending_join_group (grp_id,user_id,pending_status) VALUES (?,?,?)");
		$stmt->bind_param("iis", $grp_id,$user_id,$status); //s = string, d = double, i = integer
			
		// execute
		if ($stmt->execute()) {
			
			$stmt->close();
			$con->close();
			
			echo "
			Request to join group pending.
			";
		} 
	}
	
?> 