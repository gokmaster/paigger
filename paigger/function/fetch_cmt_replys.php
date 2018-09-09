<?php
	$comment_id = $_POST["cmt_id"];
	//include database configuration file
	include "dbconn.php";
	
	// prepare and bind
	$stmt_reply = mysqli_prepare($con, "SELECT reply_id,reply,user_id,reply_date FROM p_reply 
											WHERE comment_id=?
											ORDER BY reply_date"); 
	mysqli_stmt_bind_param($stmt_reply, 'i', $comment_id); //s = string, d = double, i = integer
	
	// execute query
	mysqli_stmt_execute($stmt_reply);

	// store result (this is needed in order for longtext field to not be empty when binded to variable)
	mysqli_stmt_store_result($stmt_reply);

	//bind the result of that query to variables
	mysqli_stmt_bind_result($stmt_reply, $reply_id,$reply,$user_replying,$reply_date);

	$rowCount = mysqli_stmt_num_rows( $stmt_reply );
	
	 if($rowCount > 0){	
	 	 
		include_once "user_info_functions.php";
		include_once "cmt_reply_functions.php";
		include_once "formatted_date_function.php";
		
		while (mysqli_stmt_fetch($stmt_reply)) {
			include "frontend_cmt_replys.php";
		} //while
		
		
		
	 } // if($rowCount > 0)
	
	mysqli_stmt_close($stmt_reply);
	
	//mysqli_close($con);


	


?>