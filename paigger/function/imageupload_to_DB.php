<?php
	if(!isset($_SESSION)){session_start();}
	// this php script is called by upload.php
	
	if(isset($_SESSION["user_id"]) ) 
	{
		//retrieve file containing database connection
		include "dbconn.php";

		// prepare and bind
		$stmt = $con->prepare("INSERT INTO p_images (filename, user_id) VALUES (?,?)");
		
		// $filename is from upload.php
		$stmt->bind_param("si", $fileName, $user_id); //s = string, d = double, i = integer
		
		// set parameters and execute
		$user_id = $_SESSION["user_id"];
		
		$stmt->execute();

		$stmt->close();
		$con->close();

		
		//$_SESSION["img_filename"] = $fileName;
		
		// show image preview
		echo "
		<img class='image_preview loadingImg' alt=image-preview src=\"image/image_uploads/$fileName\" >
		<br>";
	
	}//if
?>
