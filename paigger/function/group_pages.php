<?php
	//include database configuration file
	require_once "dbconn.php";
		
	require_once "group_functions.php";
	
	$any_error = "no";
	
	$group_privacy = fetch_group_privacy($group_id);
	$logged_in_user = $_SESSION["user_id"];
	
	if ($group_privacy == "closed") {
			
		// if user is not a group member
		if (!user_is_grp_member($group_id,$logged_in_user) ) {
			echo "<span class=red >Only members can see content posted in this group.</span>" ;
			$any_error = "yes";
		}
	} // if $group_privacy
			
	if ($any_error == "no") {	
		// prepare and bind
		$stmt = mysqli_prepare($con, "SELECT pageid,page_title,page_date,content,user_id FROM page 
										WHERE audience = ? 
										ORDER BY page_date DESC LIMIT 10");
										
		mysqli_stmt_bind_param($stmt, 's', $group_id); //s = string, d = double, i = integer

		// execute query
		mysqli_stmt_execute($stmt);

		// store result (this is needed in order for longtext field to not be empty when binded to variable)
		mysqli_stmt_store_result($stmt);

		//bind the result of that query to variables
		mysqli_stmt_bind_result($stmt, $pageid,$pagetitle,$pagedate,$pagecontent,$page_author);

		$rowCount = mysqli_stmt_num_rows( $stmt );
		
		 if($rowCount > 0){	
		 
			require_once "limit_words_function.php";
			require_once "user_info_functions.php";
			
			while (mysqli_stmt_fetch($stmt)) {
			
				$author_fname = fname($page_author);
				$author_lname = lname($page_author);
				$author_pic = profile_pic($page_author);
				
				//limit the amount of words to be displayed
				$shorten_content = limit_words($pagecontent);
				
				// date is converted to desired format
				include_once "formatted_date_function.php";
				$formatted_date = format_date($pagedate);
				
				echo "
				<div class=page>
					<span style='float:right;' class=smalltext>$formatted_date</span>
					<a href=profile.php?user=$page_author >
						<img class=medium_profile_pic src=image/image_uploads/$author_pic alt=profile-picture />
					</a>
					<a href=profile.php?user=$page_author class=smalltext >$author_fname $author_lname</a>
					
										
					<br><a href=pageview.php?pageid=$pageid ><b>$pagetitle</b></a>
					<div style='clear:both;' >
						$shorten_content
						<a href=pageview.php?pageid=$pageid class=smalltext>... Read more...</a>
					</div>
				
				</div>
				";
			} //while

			// show_more button
		echo "

		<div class=show_more_main id=show_more_main$pageid>
			<span id=$pageid class=show_more title='Load more pages'>Show more</span>
			<span class=loading style=display:none;>
				<span class=loding_txt>Loading....</span>
			</span>
		</div>

		";
		 } // if rowCount
		
		mysqli_stmt_close($stmt);
	
	} // if $any_error

?>