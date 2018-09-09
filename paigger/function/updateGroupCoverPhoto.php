<?php
	session_start();
	
	$image = $_POST['imagefile'];
	$grp_id = $_POST['group_id'];
	$user_id = $_SESSION["user_id"];
	
	include "group_functions.php";
	
	if(isset($_SESSION["user_id"]) && user_is_grp_admin($grp_id,$user_id) )
	{
	  //retrieve file containing database connection
		include "dbconn.php";
		
		// prepare and bind
		$stmt = $con->prepare("UPDATE p_group SET grp_coverphoto=? WHERE grp_id=?");
		$stmt->bind_param("si", $image, $grp_id); //s = string, d = double, i = integer
		
		$stmt->execute();
				
		$stmt->close();
		$con->close();	
		
		//mysqli_close($con);
	
	} //if
?>