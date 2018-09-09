<?php

	//include database configuration file
	include "dbconn.php";
		
	$page_id = $_GET["pageid"];
	
	echo "
	<input class=hidden_page_id value=$page_id type=hidden>";
	
	// prepare and bind
	$stmt_cmt = mysqli_prepare($con, "SELECT comment_id,comment,user_id,comment_date FROM p_comment 
									WHERE page_id=?
									ORDER BY comment_date DESC LIMIT 6");
	mysqli_stmt_bind_param($stmt_cmt, 'i', $page_id); //s = string, d = double, i = integer

	// execute query
	mysqli_stmt_execute($stmt_cmt);

	// store result (this is needed in order for longtext field to not be empty when binded to variable)
	mysqli_stmt_store_result($stmt_cmt);

	//bind the result of that query to variables
	mysqli_stmt_bind_result($stmt_cmt, $comment_id,$comment,$user_commenting,$comment_date);

	$rowCount = mysqli_stmt_num_rows( $stmt_cmt );
	
	 if($rowCount > 0){	
		
		include_once "user_info_functions.php";
		include_once "comment_functions.php";
		
		while (mysqli_stmt_fetch($stmt_cmt)) {
			// comment section
			include "frontend_comments.php";
		} //while

		// show_more button
	echo "
	
	<div class=show_more_main>
		<span id=$comment_id class=show_more_comments >Show more comments</span>
		<span class=loading style=display:none;>
			<span class=loding_txt>Loading....</span>
		</span>
	</div>

	";
	 }
	
	mysqli_stmt_close($stmt_cmt);
	
	mysqli_close($con);


	


?>