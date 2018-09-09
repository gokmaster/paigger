<?php
// called by group.php

	require_once "dbconn.php";
	
	require_once "user_info_functions.php";
	
	// prepare and bind
	$stmt = mysqli_prepare($con, "SELECT user_id FROM p_grp_members WHERE grp_id = ? AND member_status = 'admin'");
	mysqli_stmt_bind_param($stmt, "i", $group_id); //s = string, d = double, i = integer

	// execute query
	mysqli_stmt_execute($stmt);

	//bind the result of that query to variables
	mysqli_stmt_bind_result($stmt, $group_admin);
	
	// May need this too...
	mysqli_stmt_store_result( $stmt );
	
	$rowCount = mysqli_stmt_num_rows( $stmt );
	
	
	if ($rowCount > 0) {
		echo "
		<div class=profile_section >
			<div class='profile_section_title'><b>Admin</b></div>";
			
		while (mysqli_stmt_fetch($stmt)) {
			
			$admin_fname =  fname($group_admin);
			$admin_lname =  lname($group_admin);
			$admin_pic =  profile_pic($group_admin);
			
			echo "
				<div class=userPicDiv >
					<a href=profile.php?user=$group_admin ><img class=userPic src=image/image_uploads/$admin_pic alt=profile-pic ></a>
					<br>
					<a href=profile.php?user=$group_admin class=smalltext >$admin_fname $admin_lname</a>
					<input type=hidden class=hidden_user_id value=$group_admin >
				</div>
			";
		
		} // while
					
		echo "    
		</div>
			";
	} // if rowCount
		

?>