<?php
if ( isset($_POST["id"]) && !empty($_POST["id"]) )  
{

	//include database configuration file
	include "dbconn.php";
	
	//count all rows except already displayed
	$queryAll = mysqli_prepare($con, "SELECT COUNT(follow_id) as num_rows FROM p_follow WHERE follower_id = ? AND follow_id < ? ORDER BY follow_id DESC");
	mysqli_stmt_bind_param($queryAll, "ii", $follower_id, $last_followid); //s = string, d = double, i = integer

	$follower_id = $_POST["user_id"];
	$last_followid = $_POST["id"];

	// execute query
	mysqli_stmt_execute($queryAll);

	//bind the result of that query to variables
	mysqli_stmt_bind_result($queryAll, $num_rows);

	$allRows = 0;

	while (mysqli_stmt_fetch($queryAll)) {
		$allRows = $num_rows;
	}

	$showLimit = 6;

	// prepare and bind
	$stmt = mysqli_prepare($con, "SELECT follow_id,user_id FROM p_follow WHERE follower_id = ? AND follow_id < ? ORDER BY follow_id DESC LIMIT ".$showLimit);
	mysqli_stmt_bind_param($stmt, "ii", $follower_id, $last_followid); //s = string, d = double, i = integer

	// execute query
	mysqli_stmt_execute($stmt);

	//bind the result of that query to variables
	mysqli_stmt_bind_result($stmt, $follow_id, $following_user_id);

	// May need this too...
	mysqli_stmt_store_result( $stmt );

	$rowCount = mysqli_stmt_num_rows( $stmt );


	if($rowCount > 0){ 
		include "user_info_functions.php";
		
		while (mysqli_stmt_fetch($stmt)) {
						
			$folwingfname = fname($following_user_id);
			$folwinglname = lname($following_user_id);
			$folwingprofile_pic = profile_pic($following_user_id);
			
			echo "
			<div class=userPicDiv >
				<a href=profile.php?user=$following_user_id ><img class=userPic src=image/image_uploads/$folwingprofile_pic alt=profile-pic ></a>
				<br>
				<a href=profile.php?user=$following_user_id class=smalltext >$folwingfname $folwinglname</a>
			</div>
			";
			
		} //while


			// show_more button
		if($allRows > $showLimit){ 
		echo "
			<div class=show_more_main_folwing id=show_more_main_folwing$follow_id>
				<span id=$follow_id class=show_more_folwing title='Show more'>Show more</span>
				<span class=loading_folwing style=display:none;>
					<span class=loding_txt_folwing>Loading....</span>
				</span>
			</div> 
			";
			}
			
	} // if rowcount 
	
mysqli_stmt_close($queryAll);
mysqli_stmt_close($stmt);
mysqli_close($con);

}// if isset($_post)


?>