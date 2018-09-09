<?php

	//include database configuration file
	include "dbconn.php";
	
	// prepare and bind
	$stmt_reply = mysqli_prepare($con, "SELECT * FROM (
											SELECT reply_id,reply,user_id,reply_date FROM p_reply 
											WHERE comment_id=?
											ORDER BY reply_date DESC LIMIT 4)
										sub ORDER BY reply_date ASC" ); //select the last 4 rows from table, and then order them in ascending order.
	mysqli_stmt_bind_param($stmt_reply, 'i', $comment_id); //s = string, d = double, i = integer
	
	// execute query
	mysqli_stmt_execute($stmt_reply);

	// store result (this is needed in order for longtext field to not be empty when binded to variable)
	mysqli_stmt_store_result($stmt_reply);

	//bind the result of that query to variables
	mysqli_stmt_bind_result($stmt_reply, $reply_id,$reply,$user_replying,$reply_date);

	$rowCount = mysqli_stmt_num_rows( $stmt_reply );
	
	 if($rowCount > 0){	
	 
		//----------number of replies------------------
		// prepare and bind
		$stmt_numReply = mysqli_prepare($con, "SELECT COUNT(reply_id) AS num_reply FROM p_reply WHERE comment_id=?");
		mysqli_stmt_bind_param($stmt_numReply, "i", $comment_id); //s = string, d = double, i = integer

		// execute query
		mysqli_stmt_execute($stmt_numReply);
		
		//bind the result of that query to variables
		mysqli_stmt_bind_result($stmt_numReply, $num_reply);
		
		mysqli_stmt_fetch($stmt_numReply);		
		
		mysqli_stmt_close($stmt_numReply);
		//mysqli_close($con);
		
		
		// show_more button
		if($num_reply > 4){	
			echo "

			<a class=show_more_replies_link >
				Show all $num_reply replies
				
			</a>
			<input class=cmt_id type=hidden value=$comment_id />
			";
		} // if($num_reply > 4)
	 
		include_once "user_info_functions.php";
		include_once "cmt_reply_functions.php";
		include_once "formatted_date_function.php";
		
		while (mysqli_stmt_fetch($stmt_reply)) {
			// comment-replies
			include "frontend_cmt_replys.php"; 
		} //while
		
		
	 } // if($rowCount > 0)
	
	mysqli_stmt_close($stmt_reply);
	
	//mysqli_close($con);


	


?>