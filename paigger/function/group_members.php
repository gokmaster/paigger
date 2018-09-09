<?php
// called by group.php

	require_once "dbconn.php";
	
	require_once "user_info_functions.php";
	
	// prepare and bind
	$stmt = mysqli_prepare($con, 
		"SELECT id,user_id 
		FROM p_grp_members 
		WHERE grp_id = ? AND member_status = 'member'
		ORDER BY id DESC LIMIT 6");
	mysqli_stmt_bind_param($stmt, "i", $group_id); //s = string, d = double, i = integer

	// execute query
	mysqli_stmt_execute($stmt);

	//bind the result of that query to variables
	mysqli_stmt_bind_result($stmt, $p_grp_members_id,$grp_member);
	
	// May need this too...
	mysqli_stmt_store_result( $stmt );
	
	$rowCount = mysqli_stmt_num_rows( $stmt );
	
	
	if ($rowCount > 0) {
		echo "
		<div class=profile_section >
			<div class='profile_section_title'><b>Members</b></div>";
			
		while (mysqli_stmt_fetch($stmt)) {
			
			$member_fname =  fname($grp_member);
			$member_lname =  lname($grp_member);
			$member_pic =  profile_pic($grp_member);
			
			echo "
				<div class=userPicDiv >
					<a href=profile.php?user=$grp_member ><img class=userPic src=image/image_uploads/$member_pic alt=profile-pic ></a>
					<br>
					<a href=profile.php?user=$grp_member class=smalltext >$member_fname $member_lname</a>
					<input type=hidden class=hidden_user_id value=$grp_member >
				</div>
			";
		
		} // while
			
				// show_more button
		echo "  
			<div class=show_more_main_members id=show_more_main_members$p_grp_members_id>
				<span id=$p_grp_members_id class=show_more_members title='Show more'>Show more</span>
				<span class=loading_members style=display:none;>
					<span class=loding_txt_members>Loading....</span>
				</span>
			</div>
		
		</div>
			";
	} // if rowCount
		

?>