<?php
		


	$reply_fname = fname($user_replying); // fname function is located in user_info_functions.php
	$reply_lname = lname($user_replying); // located in user_info_functions.php
	$reply_user_pic = profile_pic($user_replying); // located in user_info_functions.php
				
	// date is converted to desired format
	$reply_date = format_date($reply_date); // format_date function is located in formatted_date_function.php
	
	echo "
	<div class=reply_div id=reply_div_$reply_id >" ;
	
	// Edit/Delete-buttons for comment_reply
	if (reply_belongs_to_user($reply_id) ) {
		echo "
			<input onclick='showCmtReplyOptions(this)' class=btnMoreOptions type=image src=image/icon/downarrow.gif alt='More options' title='More options' >
			<div class='cmtReplyMenu hiddenDropMenu' >
				<button onclick=editCmtReply(this) class='btnEditReply' >Edit Reply</button> <br>
				<button onclick=showDeleteCmtReply(this) class='btnShowDeleteReply' >Delete Reply</button>
			</div>"; //class=cmtReplyMenu
	}
	
				
	echo "
		<input class=hidden_reply_id type=hidden value=$reply_id />
		<a href=profile.php?user=$user_replying >
			<img class=small_profile_pic src=image/image_uploads/$reply_user_pic alt=profile-picture />
		</a>
		
		<div class=reply_text_div >
			<a href=profile.php?user=$user_replying class=smalltext >$reply_fname $reply_lname</a>
			&nbsp <span class=smalltext>$reply_date</span>
			<div class=reply_content >
				$reply
			</div>
		</div>
						
	</div>"; //class=reply_div

		
		
?>