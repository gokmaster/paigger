<?php
// called by group.php

if (user_is_grp_admin($group_id,$logged_in_user) ) {
	require_once "dbconn.php";
	
	require_once "user_info_functions.php";
	
	// prepare and bind
	$stmt = mysqli_prepare($con, "SELECT user_id FROM pending_join_group WHERE grp_id = ? AND pending_status = 'pending'");
	mysqli_stmt_bind_param($stmt, "i", $group_id); //s = string, d = double, i = integer

	// execute query
	mysqli_stmt_execute($stmt);

	//bind the result of that query to variables
	mysqli_stmt_bind_result($stmt, $pending_user);
	
	// May need this too...
	mysqli_stmt_store_result( $stmt );
	
	$rowCount = mysqli_stmt_num_rows( $stmt );
	
	
	if ($rowCount > 0) {
		echo "
		<div class=profile_section >
			<div class='profile_section_title'><b>Pending requests to join group</b></div>";
			
		while (mysqli_stmt_fetch($stmt)) {
			
			$pending_fname =  fname($pending_user);
			$pending_lname =  lname($pending_user);
			$pending_pic =  profile_pic($pending_user);
			
			echo "
				<div class=pendingUserDiv >
					<a href=profile.php?user=$pending_user ><img class=userPic src=image/image_uploads/$pending_pic alt=profile-pic ></a>
					<br>
					<a href=profile.php?user=$pending_user class=smalltext >$pending_fname $pending_lname</a>
					<input type=hidden class=hidden_user_id value=$pending_user >
					<br><button class=btnApprove onclick=accept_user_into_group(this) >Approve</button> 
					<br><button class=greybutton onclick=ignoreJoinGroupRequest(this) >Ignore</button>
				</div>
			";
		
		} // while
		
		
			
		echo "    
		</div>
			";
	} // if rowCount
		
} // if user_is_grp_admin

?>