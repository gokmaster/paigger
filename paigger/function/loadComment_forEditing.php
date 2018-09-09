<?php
	session_start();
	
	include_once "login_first.php";
	
// this script is called by edit_comment() function in add_comment.js
		
	if(isset($_POST["comment_id"]) )
	{
		$comment_id = $_POST["comment_id"];
		
		require_once "comment_functions.php";
				
		if (comment_belongs_to_user($comment_id) ) {
			echo get_comment($comment_id);
		} 	
	} 		
?>

