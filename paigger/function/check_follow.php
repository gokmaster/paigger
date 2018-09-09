<?php
	//session_start();
	
	//retrieve file containing database connection
	include "dbconn.php";
	include "follow_functions.php";
	
	// get number of followers
	$num = num_followers($user_id);
	
	//----------Follow/Unfollow button-----------------
	
	$follower_id = $_SESSION["user_id"];
	
	// a user cannot follow himself
	if ($follower_id != $user_id) 
	{
					
		// already_following that means the signed-in user is following that particular person
		if (already_following($user_id)) {
            echo "
            <span class=spnFollow >
                <button id=btnUnfollow class=greybutton onclick=unfollow() >Unfollow</button>
            </span>
						
			";
		} else {
            echo "
            <span class=spnFollow >
                <button id=btnFollow onclick=follow() >Follow</button>
            </span>		
			";
		}
		
	
		//mysqli_close($con);
	
	} else {
		// there is no need for user to follow himself so Follow button is not shown
		echo "
		<span class=spnFollow >
			Followers
		</span>";
	}
?>