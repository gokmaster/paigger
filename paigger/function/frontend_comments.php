<?php
		


	$commenter_fname = fname($user_commenting); // fname function is located user_info_functions.php
	$commenter_lname = lname($user_commenting); // lname function is located user_info_functions.php
	$commenter_pic = profile_pic($user_commenting); // profile_pic function is located user_info_functions.php
				
	// date is converted to desired format
	include_once "formatted_date_function.php";
	$comment_date = format_date($comment_date);
	
	echo "
	<div class=comment_div id=comment_div_$comment_id >" ;
	
	// Edit/Delete-buttons for comments
	if (comment_belongs_to_user($comment_id) ) {
		// comment_belongs_to_user function is located in comment_functions.php
		echo "
			<input onclick='showCommentOptions(this)' class=btnMoreOptions type=image src=image/icon/downarrow.gif alt='More options' title='More options' >
			<div class='cmtMenu hiddenDropMenu' >
				<button onclick=edit_comment(this) >Edit Comment</button> <br>
				<button class='btnShowDeleteComment' onclick=showDeleteComment(this) >Delete Comment</button>
			</div>";
	}
	
	echo "
		<input class=cmt_id type=hidden value=$comment_id />
		<a href=profile.php?user=$user_commenting >
			<img class=medium_profile_pic src=image/image_uploads/$commenter_pic alt=profile-picture />
		</a>
		<a href=profile.php?user=$user_commenting class=smalltext >$commenter_fname $commenter_lname</a>
		<br><span class=smalltext>$comment_date</span>
		
		<div id=cmt_content_$comment_id class=cmt_content style='clear:both;' >
			$comment
		</div>
					
		<div id=cmtControlsDiv$comment_id class=cmtControlsDiv >
			<a class='showReplyControls'>Reply</a>
			<div class=cmtReplyControlsDiv >
				<input class=cmt_id type=hidden value=$comment_id />
				<input type=text class=txtCmtReply  placeholder='Write a reply' />
				<br><button class=btnReply >Reply</button>
				<button class='btnCancelReply greybutton' >Cancel</button>
			</div>";
			
			include "cmt_replys.php";
		echo "
		</div>
		
		<div style='clear:both;' ></div>
	</div>"; //class=page

		
		
?>