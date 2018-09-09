<?php

if ( isset($_POST["cmt_id"]) && !empty($_POST["cmt_id"]) )  
{

	//include database configuration file
	include "dbconn.php";
	
	//count all rows except already displayed
	$queryAll = mysqli_prepare($con, "SELECT COUNT(comment_id) as num_rows FROM p_comment WHERE page_id = ? AND comment_id < ? ORDER BY comment_date DESC");
	mysqli_stmt_bind_param($queryAll, "ii", $page_id, $last_cmt_id); //s = string, d = double, i = integer

	$page_id = $_POST["page_id"];
	$last_cmt_id = $_POST["cmt_id"];

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
	$stmt = mysqli_prepare($con, "SELECT comment_id,comment,user_id,comment_date FROM p_comment WHERE page_id = ? AND comment_id < ? ORDER BY comment_date DESC LIMIT ".$showLimit);
	mysqli_stmt_bind_param($stmt, "ii", $page_id, $last_cmt_id); //s = string, d = double, i = integer

	// execute query
	mysqli_stmt_execute($stmt);
	
	// store result (this is needed in order for longtext field to not be empty when binded to variable)
	mysqli_stmt_store_result($stmt);

	//bind the result of that query to variables
	mysqli_stmt_bind_result($stmt, $comment_id,$comment,$user_commenting,$comment_date);

	$rowCount = mysqli_stmt_num_rows( $stmt );


	if($rowCount > 0){ 
		
		include_once "user_info_functions.php";
		include_once "comment_functions.php";
				
		while (mysqli_stmt_fetch($stmt)) {
			// comment section
			include "frontend_comments.php";
		
		} //while


			// show_more button triggers script in js/load_more_comments.js
		if($allRows > $showLimit){ 
		echo "
		<div class=show_more_main>
			<span id=$comment_id class=show_more_comments >Show more comments</span>
			<span class=loading style=display:none;>
				<span class=loding_txt>Loading....</span>
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