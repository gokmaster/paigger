<?php
	// this php script is called by signup_to_DB.php
	
  //retrieve file containing database connection
	//include "dbconn.php";
	
	if(isset($_POST['txtemail']))
	{
		$email=$_POST['txtemail'];

		// prepared statements is used to prevent sql injection
		// prepare and bind
		$stmt = mysqli_prepare($con, "SELECT user_email FROM p_user WHERE user_email = ?");
		mysqli_stmt_bind_param($stmt, "s", $email); //s = string, d = double, i = integer

		// execute query
		mysqli_stmt_execute($stmt);
		
		//bind the result of that query to variables
		mysqli_stmt_bind_result($stmt, $resultEmail);
			
		$count = 0;
		
		while (mysqli_stmt_fetch($stmt)) {
			$count = $count + 1;
		}
		
		//mysqli_stmt_close($stmt);
		//mysqli_close($con);

		if($count > 0)
		{
			
			echo "<span class=\"red\">$email is already in use. Please enter another email.</span>";
			exit();
		}
		else
		{
			//echo "OK";
		}
	
	}
	

	
?> 