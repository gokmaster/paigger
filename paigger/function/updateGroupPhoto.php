<?php
	session_start();
	
	$grp_id = $_POST['group_id'];
	$user_id = $_SESSION["user_id"];
	
	include "group_functions.php";
	
	if(isset($_SESSION["user_id"]) && user_is_grp_admin($grp_id,$user_id) )
	{
	  //retrieve file containing database connection
		include "dbconn.php";
		
		$image = $_POST['imagefile'];
		$source_img = '../image/image_uploads/'.$image;
		
		// if the compressed version of image does NOT already exist
		if (!file_exists("../image/image_uploads/compress_".$image) ) {
		
			$destination_img = '../image/image_uploads/compress_'.$image;
			
			include "img_compress_function.php";
			
			// if image is compressed successfully
			if (compress($source_img, $destination_img, 25) ) {
				$image = pathinfo($destination_img, PATHINFO_BASENAME); // get the image filename with extension 
			}	// // if image is compressed successfully------End------	
			
		} else {
			$image = 'compress_'.$image;
		}
		
		// prepare and bind
		$stmt = $con->prepare("UPDATE p_group SET grp_pic=? WHERE grp_id=?");
		$stmt->bind_param("si", $image, $grp_id); //s = string, d = double, i = integer
		
		$stmt->execute();
				
		$stmt->close();
		$con->close();	
		
		//mysqli_close($con);
	
	} //if
?>