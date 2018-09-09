<?php
	session_start();
	
	// if not logged-in
	if(!isset($_SESSION["user_id"]) ) {
		echo "You need to login first.
		<br>
		<button onclick=hideLeaveGroupDialogBox() >Close</button>";
		exit();
	}
	
  //retrieve file containing database connection
	require_once "dbconn.php";
						
	$grp_id = $_POST['group_id']; 
	$logged_in_user = $_SESSION["user_id"];
	
	require_once "group_functions.php";
	
	if (user_is_grp_admin($grp_id,$logged_in_user) ) {
	
		// if there is only one admin in group
		if ( num_grp_admin($grp_id) == 1 ) {
			echo "Our records indicate that you are the only admin of this group. <br>
			Before you can leave this group, you need to make someone else the admin.
			<br><br>
			<button onclick=hideLeaveGroupDialogBox() >Close</button>
			";
			exit();
		}
	}
		
	//if user is a group member
	if (user_is_grp_member($grp_id,$logged_in_user) ) { 
		// prepare and bind
		$stmt = $con->prepare("DELETE FROM p_grp_members WHERE grp_id=? AND user_id=?");
		$stmt->bind_param("ii", $grp_id,$logged_in_user); //s = string, d = double, i = integer
			
		// execute
		if ($stmt->execute()) {
			
			$stmt->close();
			$con->close();
			
			echo "
			You have successfully left this group. 
			<br><br>
			<button onclick=hideLeaveGroupDialogBox() >Close</button>
			";
		} 
	}
		 
	
?> 