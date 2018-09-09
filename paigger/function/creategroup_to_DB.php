<?php
	session_start();
	
	include_once "login_first.php";
	
  //retrieve file containing database connection
	include "dbconn.php";
	
	$grp_name = $_POST['grp_name'];
	//Convert all applicable characters to HTML entities to prevent browser from rendering it as html
	$grp_name = htmlentities($grp_name, ENT_QUOTES);
	
	$privacy = $_POST['grp_privacy'];
	$privacy = htmlentities($privacy, ENT_QUOTES);
		
	include "group_functions.php";
	//check if groupname exist
	if (groupname_exist($grp_name)) {
		echo "<span class=\"red\">The name '$grp_name' is already in use. Please enter another group name.</span>";
		exit();
	}

	// prepare and bind
	$stmt = $con->prepare("INSERT INTO p_group (grp_name,grp_privacy) VALUES (?,?)");
	$stmt->bind_param("ss", $grp_name,$privacy); //s = string, d = double, i = integer
	
	//$stmt->execute();
	
	if ($stmt->execute()) {
	
		$grp_id = fetch_group_id($grp_name);
		$member_status = "admin";
		$user = $_SESSION["user_id"];
			
		echo "The group '$grp_name' has been created successfully.";
		
		if (add_user_to_group($grp_id,$user,$member_status) ) {
			echo "<br>You are the admin of this group.";
		 }
		
		echo "
		<script>
			window.location.href = '../group.php?grp_id=$grp_id';
		</script>
		
		";
		
	} else {
	echo "Error: Could not create group.";
	}

	$stmt->close();
	$con->close();	
	
	//mysqli_close($con);
?> 