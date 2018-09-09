<?php
//include database configuration file
include "dbconn.php";

// prepare and bind
$stmt = mysqli_prepare($con, "SELECT pageid,page_title,page_date,content FROM page WHERE user_id = ? AND audience <> 'only me' ORDER BY page_date DESC LIMIT 4");
mysqli_stmt_bind_param($stmt, "i", $user_id); //s = string, d = double, i = integer

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

	// show_more button
echo "

<div class=show_more_main id=show_more_main$pageid>
	<span id=$pageid class=show_more title='Load more pages'>Show more</span>
	<span class=loading style=display:none;>
		<span class=loding_txt>Loading....</span>
	</span>
</div>

";
 
} else {
	echo "No pages to show";
}

mysqli_stmt_close($stmt);
?>