<?php
session_start();

if ( isset($_POST["id"]) && !empty($_POST["id"]) )  
{
	//include database configuration file
	include "dbconn.php";
	
	if (isset($_SESSION["user_id"]) ) {
				
		include "follow_functions.php";
		$following_userid_array = users_you_following($_SESSION["user_id"]);
		
		// fetch pages created by users you following
		if ($following_userid_array != false) 
		{
	
			$following_userid_array = implode(",", $following_userid_array);
								
			//count all rows except already displayed
			$queryAll = mysqli_prepare($con, 
						"SELECT COUNT(pageid) as num_rows FROM page 
						WHERE user_id IN ($following_userid_array) 
						AND audience = 'public'
						AND pageid < ? 
						ORDER BY page_date DESC");
						
			mysqli_stmt_bind_param($queryAll, "i", $last_pageid); //s = string, d = double, i = integer

			$last_pageid = $_POST["id"];

			// execute query
			mysqli_stmt_execute($queryAll);

			//bind the result of that query to variables
			mysqli_stmt_bind_result($queryAll, $num_rows);

			$allRows = 0;

			while (mysqli_stmt_fetch($queryAll)) {
				$allRows = $num_rows;
			}

			$showLimit = 10;

			// prepare and bind
			$stmt = mysqli_prepare($con,
						"SELECT pageid,page_title,page_date,content,user_id FROM page 
						WHERE user_id IN ($following_userid_array)
						AND pageid < ? 
						ORDER BY page_date DESC LIMIT ".$showLimit);
						
			mysqli_stmt_bind_param($stmt, "i", $last_pageid); //s = string, d = double, i = integer

			// execute query
			mysqli_stmt_execute($stmt);
			
			// store result (this is needed in order for longtext field to not be empty when binded to variable)
			mysqli_stmt_store_result($stmt);

			//bind the result of that query to variables
			mysqli_stmt_bind_result($stmt, $pageid,$pagetitle,$pagedate,$pagecontent,$page_author);

			$rowCount = mysqli_stmt_num_rows( $stmt );


			if($rowCount > 0){ 
			
				include "limit_words_function.php";
				include "user_info_functions.php";
				
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
							<img class='medium_profile_pic' src=image/image_uploads/$author_pic alt=profile-picture />
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
				if($allRows > $showLimit){ 
				echo "
					<div class=show_more_main id=show_more_main$pageid >
						<span id=$pageid class=show_more title='Load more pages'>Show more</span>
						<span class=loading style=display: none;>
							<span class=loding_txt>Loading….</span>
						</span>
					</div> ";
					}
					
			} // if rowcount 
			
			mysqli_stmt_close($queryAll);
			mysqli_stmt_close($stmt);
			mysqli_close($con);
		
		} // if ($following_userid_array
	
	} // if isset session(user_id)
	
}// if isset($_post)


?>