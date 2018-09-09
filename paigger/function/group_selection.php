<?php
if(!isset($_SESSION)){session_start();}

// if not logged-in
if ( !isset($_SESSION["user_id"]) ) {
	exit();
}
		
//include database configuration file
include "dbconn.php";

$logged_in_user = $_SESSION["user_id"];

// prepare and bind
$stmt = mysqli_prepare($con, "SELECT id,grp_id FROM p_grp_members WHERE user_id = ? ORDER BY id");
mysqli_stmt_bind_param($stmt, "i", $logged_in_user); //s = string, d = double, i = integer

// execute query
mysqli_stmt_execute($stmt);

//bind the result of that query to variables
mysqli_stmt_bind_result($stmt, $id,$grp_id);

// May need this too...
mysqli_stmt_store_result( $stmt );

$rowCount = mysqli_stmt_num_rows( $stmt );



 if($rowCount > 0){	
	require_once "group_functions.php";
	
	while (mysqli_stmt_fetch($stmt)) {
					
		$grp_name = fetch_group_name($grp_id);
		//$group_pic = fetch_group_pic($grp_id);
		
		echo "
		<label><input type=radio name=groupSelect value=$grp_id >$grp_name</label><br>
				
		";
	} //while

 
} else {
	echo "You have not joined any group.";
}

mysqli_stmt_close($stmt);
?>