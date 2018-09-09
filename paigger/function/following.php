<?php
//include database configuration file
require_once "dbconn.php";

// $follower_id here, is the user_id of the profile you viewing
$follower_id = $user_id;

// prepare and bind
$stmt = mysqli_prepare($con, "SELECT follow_id,user_id FROM p_follow WHERE follower_id = ? ORDER BY follow_id DESC LIMIT 6");
mysqli_stmt_bind_param($stmt, "i", $follower_id); //s = string, d = double, i = integer

// execute query
mysqli_stmt_execute($stmt);

//bind the result of that query to variables
mysqli_stmt_bind_result($stmt, $follow_id,$following_user_id);

// May need this too...
mysqli_stmt_store_result( $stmt );

$rowCount = mysqli_stmt_num_rows( $stmt );



 if($rowCount > 0){	
	while (mysqli_stmt_fetch($stmt)) {
		
		require_once "user_info_functions.php";
			
		$folwingfname = fname($following_user_id);
		$folwinglname = lname($following_user_id);
		$folwingprofile_pic = profile_pic($following_user_id);
		
		echo "
		<div class=userPicDiv >
			<a href=profile.php?user=$following_user_id ><img class='userPic' src=image/image_uploads/$folwingprofile_pic alt=profile-pic ></a>
			<br>
			<a href=profile.php?user=$following_user_id class=smalltext >$folwingfname $folwinglname</a>
		</div>
		";
	} //while

	// show_more button
echo "

<div class=show_more_main_folwing id=show_more_main_folwing$follow_id>
	<span id=$follow_id class=show_more_folwing title='Show more'>Show more</span>
	<span class=loading_folwing style=display:none;>
		<span class=loding_txt_folwing>Loading....</span>
	</span>
</div>

";
 
} else {
	echo "Currently not following anyone.";
}

mysqli_stmt_close($stmt);
?>