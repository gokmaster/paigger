<?php
    if(!isset($_SESSION)){session_start();}
  //Buffer larger content areas like the main page content
  ob_start();
  
	//retrieve file containing database connection
	require_once "function/dbconn.php";
?>
<div class="content">

	<?php
		$logged_in_user = $_SESSION["user_id"];
		
		// user_id of profile you want to view
		$user_id = $_GET["user"];
		
		require_once "function/user_info_functions.php";
				
		$fname = fname($user_id);
		$lname = lname($user_id);
		$profile_pic = profile_pic($user_id);
		$cover_photo = cover_photo($user_id);

	echo "

	<div id=coverphotoDiv > 
		<img id=coverphoto src=image/image_uploads/$cover_photo alt='cover photo' >
		<img id=loading_coverphoto src=image/icon/loading.gif >";

	if (isset($_SESSION["user_id"]) && $logged_in_user == $user_id ) {
	echo "
		<input id=btnCoverPhoto type=image onclick=show_photoUpdateDiv('coverphoto') alt=update-cover-photo title='Update cover photo' src=image/icon/camera.gif > ";
	}

	echo "
		<div id=profilePic class=large_profile_pic style=\"background-image:url('image/image_uploads/$profile_pic');\" >
		<img id=loading_profilephoto src=image/icon/loading.gif > ";
			// $logged_in_user == $user_id means the profile being viewed belongs to the logged-in user
			if (isset($_SESSION["user_id"]) && $logged_in_user == $user_id ) {
			echo "
			<input id=btnProfilePic type=image onclick=show_photoUpdateDiv('profilephoto') alt=update-profile-photo title='Update profile photo' src=image/icon/camera.gif > ";
			}

	echo "
		</div>
	</div>

	<div class=long_div >
		<b>$fname $lname</b> 
		
		<span style=float:right; id=followers class=smalltext>
	";
		
		// follow button
		include "function/check_follow.php";	
		
		// number of followers
	echo "
			<span class=spnFollow >$num</span>
		</span>
	</div> 
	<input type=hidden id=hidden_input value=$user_id > ";	
			
	?>

	<div class="profile_section">
		<div class='profile_section_title'><b>Pages Created</b></div>
		<div class="page_list">
			<?php 
			// load pages
			require_once "function/pages.php"
			?>
		</div>
	</div>


	<div class="profile_section">
		<div class='profile_section_title'><b>Following</b></div>
		<div class='following_list'>
			<?php 
			// load list of people this user is following
			require_once "function/following.php"
			?>
		</div>
	</div>

	<div class="profile_section">
		<div class='profile_section_title'><b>Groups</b></div>
		<div class='group_list'>
			<?php 
			// load list of people this user is following
			require_once "function/my_groups.php"
			?>
		</div>
	</div>

	<div id=photoUpdateDiv>
		<input class=btnClose type=image onclick=hide_photoUpdateDiv() alt=Close title='Close' src=image/icon/close.gif >
		
		<div id="imgUploadDiv">		 
				<form id="upload_form" enctype="multipart/form-data" method="post">
                                    <input type="button" id="btnUpload" value="Upload an image" onclick="document.getElementById('file1').click();" />
                                    <input type="file" name="file1" id="file1" accept="image/*" style="display:none;">
                                    <br>
                                    <progress id="progressBar" value="0" max="100" style="width:300px;display:none;"></progress>
                                    <b id="status"></b>
                                    <p id="loaded_n_total"></p>
				</form>
				<button id="btnSetAsCoverPhoto" class="imagebutton" style="display:none;" onclick=useThisPhoto($('.image_preview')) >OK, use this photo</button> 
				<hr>
				<button id="btnMyImages"  onclick=show_my_images() >Select from My Images</button> 
			</div>
			
			<button id="btnBacktoUpload" style="display:none;"  onclick=show_img_upload_div() >Back to Upload</button> 
			<div id="myImagesDiv">		 
				
			</div>
		
	</div>

</div> <!-- class=content -->



<script type="text/javascript" src="js/invisible_profile.js" ></script>


<?php
	  //Assign all Page Specific variables
	  $MainContent = ob_get_contents();
	  ob_end_clean();
	  $title = "Paigger: $fname $lname";
	  
	$style = "
	
	";
	
	$head = "
	 <link href='styles/profilephoto_styles.css' rel='Stylesheet' type='text/css' />
	";

	  
	  //Apply the template
      include("masterpage.php");
      echo $masterContent; // defined in masterpage.php
?>
