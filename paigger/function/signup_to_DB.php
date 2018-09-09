<?php
	// this php script is called by signup_form.php
	
  //retrieve file containing database connection
	include "dbconn.php";
	
	$user_email = $_POST['txtemail'];
	// Remove all illegal characters from email
	$user_email = filter_var($user_email, FILTER_SANITIZE_EMAIL);
	
	// Validate e-mail
	if (filter_var($user_email, FILTER_VALIDATE_EMAIL) === false) {
		echo "$user_email is not a valid email address";
		exit;
	} 
	
	//check if email exist
	include_once "check_email.php";
	
	
	// prepared statements is used to prevent sql injection
	// prepare and bind
	$stmt = $con->prepare("INSERT INTO p_user (fname,lname,user_email,pword,verify_email) VALUES (?,?,?,?,?)");
	$stmt->bind_param("sssss", $fname,$lname,$user_email,$pword,$verify_email); //s = string, d = double, i = integer

	// set parameters and execute
	$fname = $_POST['txtfname'];
	//Convert all applicable characters to HTML entities to prevent browser from rendering it as html
	$fname = htmlentities($fname, ENT_QUOTES);
	
	$lname = $_POST['txtlname'];
	$lname = htmlentities($lname, ENT_QUOTES); 
		
	$pword = md5($_POST['txtpword']);
	
	//$stmt->execute();
	
	include "send_email_confirm_link.php";
	
	if ($stmt->execute()) {
	echo "<br><br>			
			Note: You won't be able to login until your email has been verified.  ";
	} else {
	echo "<br><br>	 Error: Could not create account.";
	}

	$stmt->close();
	$con->close();	
	
	//mysqli_close($con);
?> 