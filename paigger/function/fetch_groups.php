<?php
if ( isset($_POST["id"]) && !empty($_POST["id"]) )  
{

	//include database configuration file
	include "dbconn.php";
	
	//count all rows except already displayed
	$queryAll = mysqli_prepare($con, "SELECT COUNT(id) as num_rows FROM p_grp_members WHERE user_id = ? AND id < ? ORDER BY id DESC");
	mysqli_stmt_bind_param($queryAll, "ii", $user_id, $last_id); //s = string, d = double, i = integer

	$user_id = $_POST["user_id"];
	$last_id = $_POST["id"];

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
	$stmt = mysqli_prepare($con, "SELECT id,grp_id FROM p_grp_members WHERE user_id = ? AND id < ? ORDER BY id DESC LIMIT ".$showLimit);
	mysqli_stmt_bind_param($stmt, "ii", $user_id, $last_id); //s = string, d = double, i = integer

	// execute query
	mysqli_stmt_execute($stmt);

	//bind the result of that query to variables
	mysqli_stmt_bind_result($stmt, $id,$grp_id);

	// May need this too...
	mysqli_stmt_store_result( $stmt );

	$rowCount = mysqli_stmt_num_rows( $stmt );


	if($rowCount > 0) { 
		include "group_functions.php";
	
		while (mysqli_stmt_fetch($stmt)) {
						
			$grp_name = fetch_group_name($grp_id);
			$group_pic = fetch_group_pic($grp_id);
			
			echo "
			<div class=userPicDiv >
				<a href=group.php?grp_id=$grp_id title='$grp_name' >
					<img class=userPic src=image/image_uploads/$group_pic alt='Group picture' >
				</a>
				<br>
				<a href=group.php?grp_id=$grp_id class=smalltext title='$grp_name' >$grp_name</a>
			</div>
			";
		} //while


			// show_more button
		if($allRows > $showLimit){ 
		echo "
			<div class=show_more_main_groups id=show_more_main_groups$id>
				<span id=$id class=show_more_groups title='Show more'>Show more</span>
				<span class=loading_groups style=display:none;>
					<span class=loding_txt_groups>Loading....</span>
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