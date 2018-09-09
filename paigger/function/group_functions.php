<?php
// check to see if user is group admin
function user_is_grp_admin($grp_id,$user_id)
{
  //retrieve file containing database connection
	include "dbconn.php";

	// prepare and bind
	$stmt = mysqli_prepare($con, "SELECT COUNT(id) FROM p_grp_members WHERE grp_id = ? AND user_id = ? AND member_status='admin'");
	mysqli_stmt_bind_param($stmt, "ii", $grp_id,$user_id); //s = string, d = double, i = integer

	// execute query
	mysqli_stmt_execute($stmt);
	
	//bind the result of that query to variables
	mysqli_stmt_bind_result($stmt, $num);
		
	mysqli_stmt_fetch($stmt);
		
	mysqli_stmt_close($stmt);
	//mysqli_close($con);

	if($num > 0) {
		return true;		
	} else {
		return false;  }
		
}

// number of admins in group
function num_grp_admin($grp_id)
{
  //retrieve file containing database connection
	include "dbconn.php";

	// prepare and bind
	$stmt = mysqli_prepare($con, "SELECT COUNT(id) FROM p_grp_members WHERE grp_id = ? AND member_status='admin'");
	mysqli_stmt_bind_param($stmt, "i", $grp_id); //s = string, d = double, i = integer

	// execute query
	mysqli_stmt_execute($stmt);
	
	//bind the result of that query to variables
	mysqli_stmt_bind_result($stmt, $num);
		
	mysqli_stmt_fetch($stmt);
		
	mysqli_stmt_close($stmt);
	//mysqli_close($con);

	return $num;  
		
}

// Pending requests to join group
function join_group_status($grp_id,$user_id)
{
  //retrieve file containing database connection
	include "dbconn.php";

	// prepare and bind
	$stmt = mysqli_prepare($con, "SELECT pending_status FROM pending_join_group WHERE grp_id = ? AND user_id = ?");
	mysqli_stmt_bind_param($stmt, "ii", $grp_id,$user_id); //s = string, d = double, i = integer

	// execute query
	mysqli_stmt_execute($stmt);
	
	//bind the result of that query to variables
	mysqli_stmt_bind_result($stmt, $status);
		
	mysqli_stmt_fetch($stmt);
		
	mysqli_stmt_close($stmt);
	//mysqli_close($con);

	return $status; 
		
}

function user_is_grp_member($grp_id,$user_id)
{
  //retrieve file containing database connection
	include "dbconn.php";

	// prepare and bind
	$stmt = mysqli_prepare($con, "SELECT COUNT(id) FROM p_grp_members WHERE grp_id = ? AND user_id = ?");
	mysqli_stmt_bind_param($stmt, "ii", $grp_id,$user_id); //s = string, d = double, i = integer

	// execute query
	mysqli_stmt_execute($stmt);
	
	//bind the result of that query to variables
	mysqli_stmt_bind_result($stmt, $num);
		
	mysqli_stmt_fetch($stmt);
		
	mysqli_stmt_close($stmt);
	//mysqli_close($con);

	if($num > 0) {
		return true;		
	} else {
		return false;  }
		
}
	
function groupname_exist($grp_name)
{
  //retrieve file containing database connection
	include "dbconn.php";

	// prepare and bind
	$stmt = mysqli_prepare($con, "SELECT COUNT(grp_id) FROM p_group WHERE grp_name = ?");
	mysqli_stmt_bind_param($stmt, "s", $grp_name); //s = string, d = double, i = integer

	// execute query
	mysqli_stmt_execute($stmt);
	
	//bind the result of that query to variables
	mysqli_stmt_bind_result($stmt, $num_grp_name);
		
	mysqli_stmt_fetch($stmt);
		
	mysqli_stmt_close($stmt);
	//mysqli_close($con);

	if($num_grp_name > 0) {
		return true;		
	} else {
		return false;  }
		
}

function add_user_to_group($grp_id,$user_id,$member_status)
{
  //retrieve file containing database connection
	include "dbconn.php";
	
	// prepare and bind
	$stmt = $con->prepare("INSERT INTO p_grp_members (grp_id,user_id,member_status) VALUES (?,?,?)");
	$stmt->bind_param("iis", $grp_id,$user_id,$member_status); //s = string, d = double, i = integer
	
	if ($stmt->execute() ) {
	mysqli_stmt_close($stmt);
	return true;
	//mysqli_close($con);
	}
		
}

function remove_pending_grp_user($grp_id,$user_id)
{
  //retrieve file containing database connection
	include "dbconn.php";
	
	// prepare and bind
	$stmt = $con->prepare("DELETE FROM pending_join_group WHERE grp_id=? AND user_id=?");
	$stmt->bind_param("ii", $grp_id,$user_id); //s = string, d = double, i = integer
	
	if ($stmt->execute() ) {
	
	mysqli_stmt_close($stmt);
	
	return true;
	//mysqli_close($con);
	}
		
}

//--------------------------------------

function fetch_group_id($grp_name)
{
	//retrieve file containing database connection
	include "dbconn.php";
	
	// prepare and bind
	$stmt = mysqli_prepare($con, "SELECT grp_id FROM p_group WHERE grp_name = ?");
	mysqli_stmt_bind_param($stmt, "s", $grp_name); //s = string, d = double, i = integer

	// execute query
	mysqli_stmt_execute($stmt);
	
	//bind the result of that query to variables
	mysqli_stmt_bind_result($stmt, $grp_id);
		
	mysqli_stmt_fetch($stmt);
	
	mysqli_stmt_close($stmt);
	//mysqli_close($con);
	
	return $grp_id;
		
}

function fetch_group_name($grp_id)
{
	//retrieve file containing database connection
	include "dbconn.php";
	
	// prepare and bind
	$stmt = mysqli_prepare($con, "SELECT grp_name FROM p_group WHERE grp_id = ?");
	mysqli_stmt_bind_param($stmt, "i", $grp_id); //s = string, d = double, i = integer

	// execute query
	mysqli_stmt_execute($stmt);
	
	//bind the result of that query to variables
	mysqli_stmt_bind_result($stmt, $grp_name);
	
	mysqli_stmt_fetch($stmt);
	
	mysqli_stmt_close($stmt);
	//mysqli_close($con);
	
	return $grp_name;
		
}

function fetch_group_pic($grp_id)
{
	//retrieve file containing database connection
	include "dbconn.php";
	
	// prepare and bind
	$stmt = mysqli_prepare($con, "SELECT grp_pic FROM p_group WHERE grp_id = ?");
	mysqli_stmt_bind_param($stmt, "i", $grp_id); //s = string, d = double, i = integer

	// execute query
	mysqli_stmt_execute($stmt);
	
	//bind the result of that query to variables
	mysqli_stmt_bind_result($stmt, $grp_pic);
	
	mysqli_stmt_fetch($stmt);
	
	mysqli_stmt_close($stmt);
	//mysqli_close($con);
	
	return $grp_pic;
		
}

function fetch_group_coverphoto($grp_id)
{
	//retrieve file containing database connection
	include "dbconn.php";
	
	// prepare and bind
	$stmt = mysqli_prepare($con, "SELECT grp_coverphoto FROM p_group WHERE grp_id = ?");
	mysqli_stmt_bind_param($stmt, "i", $grp_id); //s = string, d = double, i = integer

	// execute query
	mysqli_stmt_execute($stmt);
	
	//bind the result of that query to variables
	mysqli_stmt_bind_result($stmt, $grp_cover);
	
	mysqli_stmt_fetch($stmt);
	
	mysqli_stmt_close($stmt);
	//mysqli_close($con);
	
	return $grp_cover;
		
}

function fetch_group_privacy($grp_id)
{
	//retrieve file containing database connection
	include "dbconn.php";
	
	// prepare and bind
	$stmt = mysqli_prepare($con, "SELECT grp_privacy FROM p_group WHERE grp_id = ?");
	mysqli_stmt_bind_param($stmt, "i", $grp_id); //s = string, d = double, i = integer

	// execute query
	mysqli_stmt_execute($stmt);
	
	//bind the result of that query to variables
	mysqli_stmt_bind_result($stmt, $grp_privacy);
	
	mysqli_stmt_fetch($stmt);
	
	mysqli_stmt_close($stmt);
	//mysqli_close($con);
	
	return $grp_privacy;
		
}
	
?> 