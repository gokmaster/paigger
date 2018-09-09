<?php
	session_start();
	
	if(isset($_SESSION["user_id"]) )
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
		$stmt = $con->prepare("UPDATE p_user SET profile_pic=? WHERE user_id=?");
		$stmt->bind_param("si", $image, $user_id); //s = string, d = double, i = integer

		// set parameters and execute
		$user_id = $_SESSION["user_id"];
		
		$stmt->execute();
		
		$_SESSION["profile_pic"] = $image;
		
		$stmt->close();
		$con->close();	
		
		//mysqli_close($con);
	
	} //if
?>