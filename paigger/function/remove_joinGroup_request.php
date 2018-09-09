<?php
	session_start();
	
  //retrieve file containing database connection
	require_once "dbconn.php";
			
	require_once "group_functions.php";
	
	$grp_id = $_POST['group_id']; 
	$pending_grp_user = $_POST['pending_grp_user']; 
	$logged_in_user = $_SESSION["user_id"];
		
	if (user_is_grp_admin($grp_id,$logged_in_user) ) {
											
		//Remove join-group request
		if (remove_pending_grp_user($grp_id,$pending_grp_user) ) {
			echo "User request to join group ignored.";
		}
				
	} // if user_is_grp_admin
	
?> 