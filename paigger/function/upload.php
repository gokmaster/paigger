<?php
if(!isset($_SESSION)){session_start();}
	
include_once "login_first.php";

	$fileName = $_FILES["file1"]["name"]; // The file name
	$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
	$fileType = $_FILES["file1"]["type"]; // The type of file it is
	$fileSize = $_FILES["file1"]["size"]; // File size in bytes
	$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
	
	if (!$fileTmpLoc) { // if file not chosen
		echo "ERROR: Please browse for a file before clicking the upload button.";
		exit();
	} 
		
	// Check if image file is a actual image or fake image
	 $check = getimagesize($fileTmpLoc);
	  if($check == false) {
        echo "Error: The file you uploaded was invalid. Only gif, png, jpg, or jpeg files are supported";
		exit();
    } 
	
	// allowed file extensions
	$allowed =  array('gif','png','jpg','jpeg','GIF','PNG','JPG','JPEG');
	$ext = pathinfo($fileName, PATHINFO_EXTENSION);
	if(!in_array($ext,$allowed) ) {
		echo 'Error: Invalid file. Only gif, png, jpg, or jpeg files are supported';
		exit();
	} 
	
	 // Check file size
	if ($fileSize > 3000000) { // 1000,000 = 1MB or 1000KB size
		echo "Error: Your file is too large. File size limit is 3MB.";
		exit();
	} 
		 
		 
	//remove whitespaces from filename
	$fileName = preg_replace('/\s+/', '_', $fileName);
	
	//shorten filename if greater than 40 characters
	if(strlen($fileName)> 40)
	{ 
	 $fileName = substr($fileName, -39);
	}
	
	//add a random number to filename to give it a new file name
	$random = mt_rand();
	$random2 = mt_rand(1,9900); //random number between 1 and 9900
	$originalFileName = $fileName;
	$fileName = $random."_".$random2."_".$fileName;
	

	// rename file if it already exist in folder
	while (file_exists("../image/image_uploads/".$fileName) ) {  
	  $num = mt_rand(10,992100);
	  $num2 = mt_rand();
	  $fileName = $num."_".$num2."_".$originalFileName; 

	} // while
	
	$destination_img = '../image/image_uploads/'.$fileName;
			
	include "img_compress_function.php";
		
	// if compressing image is successful
	if (compress($fileTmpLoc, $destination_img, 80) ) { 		
		include "imageupload_to_DB.php"; // record in database
	 
	} elseif (move_uploaded_file($fileTmpLoc, $destination_img) ) { // move file to the specified folder 
		include "imageupload_to_DB.php"; // record in database
	} else {
		echo "Error: Failed to upload image";
	}



?>