<?php
	session_start();
	
  //retrieve file containing database connection
	require_once "dbconn.php";
			
	require_once "group_functions.php";
	
	$grp_id = $_POST['group_id']; 
	//Convert all applicable characters to HTML entities to prevent browser from rendering it as html
	$grp_id = htmlentities($grp_id, ENT_QUOTES);
	
	$pending_grp_user = $_POST['pending_grp_user']; 
	$pending_grp_user = htmlentities($pending_grp_user, ENT_QUOTES);
	
	$logged_in_user = $_SESSION["user_id"];
		
	if (user_is_grp_admin($grp_id,$logged_in_user) ) {
		
		// if not already a group member
		if (!user_is_grp_member($grp_id,$pending_grp_user) ) {
			$member_status = "member";
								
			//add user to group
			if (add_user_to_group($grp_id,$pending_grp_user,$member_status) ) {
				
				//User request to join group is no longer pending
				remove_pending_grp_user($grp_id,$pending_grp_user);
				
				echo "User added to group.";
			} else {
				echo "Error: Could not add user to group. Try again later.";
			}
		
		} // if !user_is_grp_member
		
	} // if user_is_grp_admin
	
?> 