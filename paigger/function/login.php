<?php
	// this php script is called by login_form.php
	
	session_start();
	
  //retrieve file containing database connection
	include "dbconn.php";
	
	if (isset($_POST['txtemail']))
	{
		$email=$_POST['txtemail'];
		$pword= md5($_POST['txtpword']);
		$verify_email = "complete";

		// prepared statements is used to prevent sql injection
		// prepare and bind
		$stmt = mysqli_prepare($con, "SELECT user_id,fname,lname,profile_pic FROM p_user WHERE user_email = ? AND pword = ? AND verify_email = ?");
		mysqli_stmt_bind_param($stmt, "sss", $email,$pword,$verify_email); //s = string, d = double, i = integer
		
		$count = 0;
		// execute query
		if (mysqli_stmt_execute($stmt)) {
		
		//bind the result of that query to variables
		mysqli_stmt_bind_result($stmt, $id,$fname,$lname,$profile_pic);
					
			while (mysqli_stmt_fetch($stmt)) {
				$count = $count + 1;
			} // while
			
			if ($count > 0) {
				echo "Log in successful";
				
				// Set session variables
				$_SESSION["user_id"] = $id;
				$_SESSION["fname"] = $fname;
				$_SESSION["lname"] = $lname;
				$_SESSION["profile_pic"] = $profile_pic;
				
				if (isset($_SESSION["goto_url"]) ) {
					// go to the webpage user was previously viewing before he was directed to login page
					$goto_url = $_SESSION["goto_url"];
					echo "
					<script>
						window.location.href = '$goto_url';
					</script>";
				} else {
					echo "
					<script>
						window.location.href = 'home.php';
					</script>
					";
				}
				
			} else {
				echo "<span class=\"red\">Incorrect email or password</span>";
			}
			
			
		} else {
		
			echo "<span class=\"red\">Error: Your email and password could not be processed. Please try again later.</span>";
		}
		
		
		mysqli_stmt_close($stmt);
		mysqli_close($con);

		
	
	}
	
?> 