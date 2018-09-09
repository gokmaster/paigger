<?php
	session_start();
	// this php script is called by follow-script.js
	
	include_once "login_first.php";
	
  //retrieve file containing database connection
	include "dbconn.php";
			
	include "follow_functions.php";

	$user_id = $_POST['id'];
	$follower_id = $_SESSION["user_id"];
	
	//if following
	if (already_following($user_id)) { 
		// prepare and bind
		$stmt = $con->prepare("DELETE FROM  p_follow WHERE user_id=? AND follower_id=?");
		$stmt->bind_param("ii", $user_id,$follower_id); //s = string, d = double, i = integer
			
		// execute
		if ($stmt->execute()) {
			
			$stmt->close();
			$con->close();
			
			// get number of followers
			$num = num_followers($user_id);
			echo "
            <span class=spnFollow >
                <button id=btnFollow onclick=follow() >Follow</button>
            </span>	
			<span class=spnFollow >$num</span>"; // number of followers
		} 
	}

	
?> 