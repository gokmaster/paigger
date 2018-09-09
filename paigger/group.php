<?php
	session_start();
  //Buffer larger content areas like the main page content
  ob_start();
  
	//retrieve file containing database connection
	require_once "function/dbconn.php";
?>

<div class="content">

	<?php
		$logged_in_user = $_SESSION["user_id"];
		
		// group_id of group you want to view
		$group_id = $_GET["grp_id"];
		
		require_once "function/group_functions.php";
				
		$grp_name = fetch_group_name($group_id);
		$grp_name = ucfirst($grp_name); //First letter to uppercase
		
		$group_pic = fetch_group_pic($group_id);
		$grp_cover_photo = fetch_group_coverphoto($group_id);
		
		$grp_privacy = fetch_group_privacy($group_id);
		$grp_privacy = ucfirst($grp_privacy); //First letter to uppercase

	echo "

	<div id=coverphotoDiv > 
		<img id=coverphoto src=image/image_uploads/$grp_cover_photo alt='cover photo' >
		<img id=loading_coverphoto src=image/icon/loading.gif >";

	if (user_is_grp_admin($group_id,$logged_in_user) ) {
	echo "
		<input id=btnCoverPhoto type=image onclick=show_photoUpdateDiv('coverphoto') alt=update-cover-photo title='Update cover photo' src=image/icon/camera.gif > ";
	}

	echo "
		<div id=profilePic class=large_profile_pic style=\"background-image:url('image/image_uploads/$group_pic');\" >
		<img id=loading_profilephoto src=image/icon/loading.gif > ";
		
			// $logged_in_user == $user_id means the profile being viewed belongs to the logged-in user
			if (user_is_grp_admin($group_id,$logged_in_user) ) {
			echo "
			<input id=btnProfilePic type=image onclick=show_photoUpdateDiv('profilephoto') alt=Update-group-photo title='Update group photo' src=image/icon/camera.gif > ";
			}

	echo "
		</div>
	</div>

	<div class=long_div >
			
		<span style=float:right; id=joingroup class=smalltext>
	";
		
		// Join-group/Leave-group button
		if (user_is_grp_member($group_id,$logged_in_user) ) {
			echo "<button id=btnLeaveGroup class=greybutton onclick=showLeaveGroupDialogBox() >Leave Group</button>";
		} else 
		if (join_group_status($group_id,$logged_in_user) == "pending") { 
			echo "Request to join group pending.";
		}
		else {
			echo "<button id=btnJoinGroup onclick=joinGroupRequest() >Join Group</button>";
		}
		
	echo "	
			
		</span>
		
		<b>$grp_name</b> <br>
		
		<span class=smalltext>
			$grp_privacy Group
		</span>
		
	</div> 
	<input type=hidden id=hidden_input value=$group_id > ";	
			
	?>

	<div id='group_menu_div'>
		<button id='btnGrpHome' onclick=showHomeDiv() disabled='disabled' >Home</button>
		<button id='btnGrpMembers' onclick=showMembersDiv() >Members</button>
	</div>

	<div id='grp_home_div' >
	<?php
		include "function/group_pages.php";
	?>
	</div>

	<div id='grp_members_div' class='hidden_group_div'>
	<?php
		require_once "function/group_members_pending.php";
		require_once "function/group_admin.php";
		require_once "function/group_members.php";
	?>
	</div>

	<div id='leaveGroupDialogBox' class='dialogBoxDiv'>
		<div class='dialogBoxHeading' ><b>Leave this Group</b></div>
		Are you sure you want to leave <?php echo $grp_name; ?>?
		<br><br>
			<div style='float:right;'>
				<button onclick='leaveGroup()' >Leave Group</button> 
				&nbsp <button class='greybutton' onclick='hideLeaveGroupDialogBox()' >Cancel</button>
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



<script type="text/javascript" src="js/invisible_group.js" ></script>


<?php
	  //Assign all Page Specific variables
	  $MainContent = ob_get_contents();
	  ob_end_clean();
	  $title = "$grp_name";
	  
	$style = "
	
	";
	
	$head = "
	 <link href='styles/profilephoto_styles.css' rel='Stylesheet' type='text/css' />
	 <link href='styles/group_styles.css' rel='Stylesheet' type='text/css' />
	";

	  
	  //Apply the template
      include("masterpage.php");
      echo $masterContent; // defined in masterpage.php
?>
