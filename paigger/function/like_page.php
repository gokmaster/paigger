<?php
	session_start();
	// this php script is called by like-script.js
	
	include_once "login_first.php";
	
  //retrieve file containing database connection
	include "dbconn.php";
		
	include "likes_functions.php";
	
	$page_id = $_POST['id']; 
	$user_id = $_SESSION["user_id"];
	
	//if not already liked
	if (!already_liked($page_id)) { 
		// prepare and bind
		$stmt = $con->prepare("INSERT INTO page_likes (user_id,page_id) VALUES (?,?)");
		$stmt->bind_param("ii", $user_id,$page_id); //s = string, d = double, i = integer
			
		// execute
		if ($stmt->execute()) {
			
			$num_pagelikes = num_likes($page_id); // get number of page likes
			
			$stmt->close();
			$con->close();
			
			echo "
				<input onclick='unlike_page($page_id)' id='btnUnlike' class='like_button' type='image' alt='Liked' title='You liked this' src='image/icon/like.png' />
				$num_pagelikes
			";
		} 
	}

	
?> 