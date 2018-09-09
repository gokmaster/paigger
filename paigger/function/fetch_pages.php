<?php
if ( isset($_POST["id"]) && !empty($_POST["id"]) )  
{

	//include database configuration file
	include "dbconn.php";
	
	//count all rows except already displayed
	$queryAll = mysqli_prepare($con, "SELECT COUNT(pageid) as num_rows FROM page WHERE user_id = ? AND pageid < ? ORDER BY page_date DESC");
	mysqli_stmt_bind_param($queryAll, "ii", $user_id, $last_pageid); //s = string, d = double, i = integer

	$user_id = $_POST["user_id"];
	$last_pageid = $_POST["id"];

	// execute query
	mysqli_stmt_execute($queryAll);

	//bind the result of that query to variables
	mysqli_stmt_bind_result($queryAll, $num_rows);

	$allRows = 0;

	while (mysqli_stmt_fetch($queryAll)) {
		$allRows = $num_rows;
	}

	$showLimit = 4;

	// prepare and bind
	$stmt = mysqli_prepare($con, "SELECT pageid,page_title,page_date,content FROM page WHERE user_id = ? AND pageid < ? AND audience <> 'only me' ORDER BY page_date DESC LIMIT ".$showLimit);
	mysqli_stmt_bind_param($stmt, "ii", $user_id, $last_pageid); //s = string, d = double, i = integer

	// execute query
	mysqli_stmt_execute($stmt);
	
	// store result (this is needed in order for longtext field to not be empty when binded to variable)
	mysqli_stmt_store_result($stmt);

	//bind the result of that query to variables
	mysqli_stmt_bind_result($stmt, $pageid,$pagetitle,$pagedate,$pagecontent);

	$rowCount = mysqli_stmt_num_rows( $stmt );


	if($rowCount > 0){ 
	
		include "limit_words_function.php";
		
		while (mysqli_stmt_fetch($stmt)) {
			
			//limit the amount of words to be displayed
			$shorten_content = limit_words($pagecontent);
			
			// date is converted to desired format
			include_once "formatted_date_function.php";
			$formatted_date = format_date($pagedate);
			
			echo "
			<div class=page>
			<span class=smalltext>$formatted_date</span>
			<br><a href=pageview.php?pageid=$pageid ><b>$pagetitle</b></a>
			<br>$shorten_content 
			<a href=pageview.php?pageid=$pageid class=smalltext>... Read more...</a>
			
			
			</div>
			";
		} //while


			// show_more button triggers script in js/load_more_pages.js
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

}// if isset($_post)


?>