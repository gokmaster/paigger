<?php 

// Returns a compressed image i.e. image with reduced file size
function compress($source, $destination, $quality) {

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg')  {
        $image = imagecreatefromjpeg($source); }

    elseif ($info['mime'] == 'image/gif') {
        $image = imagecreatefromgif($source); }

    elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source); }
	
	// if image is compressed successfully
    if (imagejpeg($image, $destination, $quality) ) {
		return true;
	} else {
		return false;
	}
}

?>