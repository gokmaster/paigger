<?php
	session_start();
	// this php script is called by like-script.js
	
	include_once "login_first.php";
	
  //retrieve file containing database connection
	include "dbconn.php";
		
	include "likes_functions.php";
	
	$page_id = $_POST['id']; 
	$user_id = $_SESSION["user_id"];
	
	//if already liked
	if (already_liked($page_id)) { 
		// prepare and bind
		$stmt = $con->prepare("DELETE FROM page_likes WHERE user_id=? AND page_id=?");
		$stmt->bind_param("ii", $user_id,$page_id); //s = string, d = double, i = integer
			
		// execute
		if ($stmt->execute()) {
		
			$num_pagelikes = num_likes($page_id); // get number of page likes
			
			$stmt->close();
			$con->close();
			
			echo "
				<input onclick='like_page($page_id)' id='btnLike' class='like_button grey_img' type='image' alt='Like' title='Like' src='image/icon/like.png' />
				$num_pagelikes
			";
			
		} 
	}

	
?> 