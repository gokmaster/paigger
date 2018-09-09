// do not modify names of following functions---------
// showCommentOptions, showDeleteComment, deleteComment, edit_comment, remove_empty_para
//-----------------------------------------------------------	
	var active_comment; //comment_ID that is currently being in edit or delete
	var active_cmtReply; //comment_reply_ID that is currently being in edit or delete
	var active_cmtReply_text; // text of the active_cmtReply
	
	$('#textarea').click(function (e) {
		$('#btnComment').prop("disabled",false); // enable button		
	});

	// Add Comment
	$('#btnComment').click(function (e) {
		$(this).prop("disabled",true); // disable button
		 
		remove_nbsp_from_p(); //remove &nbsp from <p>
		remove_empty_para(); // remove empty paragraphs
									
		var content = $("#textarea").html();
		var content_length = $.trim($('div[contenteditable]').text()).length;					
		var pageid = $("#hidden_pageid").val();
		
		
		if (content != null && content != "" && (content_length > 0) )
		{		
			$(this).prepend('<div class=loadingDiv ></div>');
			$.post("function/addComment.php", 
				{ comment: content, page_id: pageid} ,
				function(result){ 
				$("#textarea").empty(); 
				// refresh div (>*"," prevents nested div) (space before # is needed)
				$('#commentSection').load(document.URL +  " #commentSection>*",""); 
				$('.loadingDiv').remove();
				$("#textarea").html(result);
				} 
			); // post		
		} else {
			alert("Please type your comment before clicking 'Comment' button.")
		}
		
		$(this).prop("disabled",false); // enable button
	});  
	
	
	// show Comment options
	function showCommentOptions(btn_more_options) {
		$(btn_more_options).parent().find('.cmtMenu').show();
	}
	
	// show Comment_reply options
	function showCmtReplyOptions(btn_more_options) {
		$(btn_more_options).parent().find('.cmtReplyMenu').show();
	}
	
	// show Delete Comment dialog box
	function showDeleteComment(del_button) {
		var cmt_id_element = $(del_button).parent().parent().find(".cmt_id");
		active_comment = cmt_id_element.val();
		
		var html_content = 	"\
				<div class='dialogBoxHeading' >Delete Comment</div>\
				<p>Are you sure you want to delete this comment?</p><br>\
				<span style='float:right;' >\
					 <button class='btnDeleteComment' onclick='deleteComment()' >Delete</button>\
					 <button class='greybutton' onclick=closeThis($('.dialogBoxHeading')) >Cancel</button>\
				</span>";
										
		$('.deleteCommentDiv').html(html_content);
		$('.deleteCommentDiv').show();
		$('.hiddenDropMenu').hide();			
	}
	
	// show Delete Comment_reply dialog box
	function showDeleteCmtReply(del_button) {
		var cmtReply_id_element = $(del_button).parent().parent().find(".hidden_reply_id");
		active_cmtReply = cmtReply_id_element.val();
		
		var html_content = 	"\
				<div class='dialogBoxHeading' >Delete Reply</div>\
				<p>Are you sure you want to delete this reply?</p><br>\
				<span style='float:right;' >\
					 <button class='btnDeleteComment' onclick='deleteCmtReply()' >Delete</button>\
					 <button class='greybutton' onclick=closeThis($('.dialogBoxHeading')) >Cancel</button>\
				</span>";
										
		$('.deleteCommentDiv').html(html_content);
		$('.deleteCommentDiv').show();
		$('.hiddenDropMenu').hide();			
	}
		
	function deleteComment() {
		$(".deleteCommentDiv").html('<div class=loadingDiv ></div> Deleting comment. Please wait...');
					
		$.post("function/deleteComment.php", 
			{comment_id: active_comment} ,
			function(result){ 
					$(".deleteCommentDiv").html(result); 
					$("#comment_div_"+active_comment).remove();
					//$(".deleteCommentDiv").empty();
					$(".deleteCommentDiv").hide();
					}
		); //post	
	}
	
	function deleteCmtReply() {
		$(".deleteCommentDiv").html('<div class=loadingDiv ></div> Deleting reply. Please wait...');
					
		$.post("function/deleteCmtReply.php", 
			{cmtReply_id: active_cmtReply} ,
			function(result){ 
					$(".deleteCommentDiv").html(result); 
					
					$("#reply_div_"+active_cmtReply).remove(); 
					//$(".deleteCommentDiv").empty();
					$(".deleteCommentDiv").hide();
					}
		); //post	
	}
	
	// load comment for editing
	function edit_comment(edit_button) {
		var cmt_id_element = $(edit_button).parent().parent().find(".cmt_id");
		active_comment = cmt_id_element.val();
		
		var buttons = "<button id=btnSaveEditCmt >Save Edits</button> <button id=btnCancelEditCmt class=greybutton >Cancel</button>";
				
		$.post("function/loadComment_forEditing.php", 
			{comment_id: active_comment} ,
			function(result){ 
					$("#textarea").html(result); 
					$("#commentButtonsDiv").html(buttons); 
					$(".controlsBox").hide();
					document.getElementById("scroll_to_textarea").scrollIntoView(); // scroll to that location on page
					}
		);
		$('.hiddenDropMenu').hide();			
	}
	
	// Edit cmt_reply
	function editCmtReply(edit_button) {
		$('.reply_content').attr('contenteditable', false); // disable editing for all reply_content divs
		$('#btnSaveEditReply').remove();
		$('#btnCancelEditReply').remove();
		
		var reply_div = $(edit_button).parent().parent().find(".reply_text_div");
		var reply_content_div = $(reply_div).find(".reply_content");
				
		$(reply_content_div).attr('contenteditable', true); // make Div editable like a textbox
		$(reply_content_div).css({"border-color": "#C1E0FF", "border-width":"1px", "border-style":"solid"});
		
		active_cmtReply_text = $(reply_content_div).text(); // global variable
		
		// set cursor focus
		$(reply_content_div).focus();

		var buttons = "<button id=btnSaveEditReply >Save Edits</button> <button id=btnCancelEditReply class=greybutton >Cancel</button>";
		
		$(reply_div).append(buttons);
		
		$('.hiddenDropMenu').hide();	
		
	}
	
	// Save Reply Edits (.on works with dynamically generated elements)
	$(document).on("click", "#btnSaveEditReply", function() {
	
		var cmtReplyID = $(this).parent().parent().find(".hidden_reply_id").val();					
		var reply_content_div = $(this).parent().find(".reply_content");	
		var content = $(reply_content_div).text();
		var content_length = $.trim(content).length;
								
		if (content != null && content != "" && (content_length > 0) )
		{		
			$(reply_content_div).prepend('<div class=loadingDiv ></div>');
			$.post("function/cmtReply_update.php", 
				{ reply_id: cmtReplyID, reply: content} ,
				function(result){ 
				
				$(reply_content_div).attr('contenteditable', false); // disable editing
				$(reply_content_div).css({"border-width":"0px"});
				$('#btnSaveEditReply').remove();
				$('#btnCancelEditReply').remove();
				
				$('.loadingDiv').remove();
				// refresh reply_div (the space before # is needed) (>*,"" prevents nested div)
				//$("#reply_div_"+cmtReplyID).load(document.URL +  " #reply_div_"+cmtReplyID + ">*",""); 
				
				} 
			); // post		
		} else {
			alert("You haven't typed in any reply. Please, type in a reply.");
		}
		
	}); 
	
	// Save Comment Edits (.on works with dynamically generated elements)
	$(document).on("click", "#btnSaveEditCmt", function() {
		$(this).prop("disabled",true); // disable button
		
		remove_nbsp_from_p(); //remove &nbsp from <p>
		remove_empty_para(); // remove empty paragraphs
									
		var content = $("#textarea").html();
		var content_length = $.trim($('div[contenteditable]').text()).length;					
				
		if (content != null && content != "" && (content_length > 0) )
		{		
			$(this).prepend('<div class=loadingDiv ></div>');
			$.post("function/comment_update.php", 
				{ comment_id: active_comment, comment: content} ,
				function(result){ 
				$("#textarea").empty(); 
				$('.loadingDiv').remove();
				// refresh commentSection (the space before # is needed) (>*,"" prevents nested #commentSection)
				//$('#commentSection').load(document.URL +  " #commentSection>*",""); 
				$('#cmt_content_'+ active_comment).html(content);
				document.getElementById("comment_div_"+ active_comment).scrollIntoView(); // scroll to that location on page
				
				fading_background($("#cmt_content_"+ active_comment)); // call function to change background for few seconds
								
				$("#textarea").html(result);
				$("#commentButtonsDiv").html("<button id='btnComment' >Comment</button>");
				} 
			); // post		
		} else {
			alert("You haven't typed in any comment. Please, type in a comment.");
		}
		
		$(this).prop("disabled",false); // enable button
	});
	
	// Cancel Edit_Comment (.on works with dynamically generated elements)
	$(document).on("click", "#btnCancelEditCmt", function() {
		$("#textarea").empty();
		$("#commentButtonsDiv").html("<button id='btnComment' >Comment</button>");
	}); 
	
	// Cancel Edit_Reply (.on works with dynamically generated elements)
	$(document).on("click", "#btnCancelEditReply", function() {
		var reply_content = $(this).parent().find(".reply_content");
		$(reply_content).attr('contenteditable', false); // disable editing
		$(reply_content).css({"border-width":"0px"});
		$('#btnSaveEditReply').remove();
		$('#btnCancelEditReply').remove();
		$(reply_content).html(active_cmtReply_text);
		
	}); 
	
	// Show Comment Reply controls
	$(document).on("click", ".showReplyControls", function() {
		$('.cmtReplyControlsDiv').hide();
		$(this).parent().find('.cmtReplyControlsDiv').show();
	});
	
	// Cancel reply / Hide Comment Reply controls
	$(document).on("click", ".btnCancelReply", function() {
		$(this).parent().find('.txtCmtReply').val(""); // clear any values in textbox
		$(this).parent().hide(); // hide cmtReplyControlsDiv
	});
	
	// Add reply
	$(document).on("click", ".btnReply", function() {
				
		var content = $(this).parent().find('.txtCmtReply').val();
		var cmt_id = $(this).parent().find('.cmt_id').val();
		var cmtControlsDiv_id = $(this).parent().parent().attr('id');
		
		if (content != null && content != "")
		{		
			$(this).prepend('<div class=loadingDiv ></div>');
			$.post("function/addCmtReply.php", 
				{ reply: content, comment_id: cmt_id} ,
				function(result){ 
					$('.txtCmtReply').empty();
					// refresh div (>*,"" prevents nested div) (space before # is needed)
					$('#' + cmtControlsDiv_id).load(document.URL + "  #" + cmtControlsDiv_id + ">*",""); 
					$('.loadingDiv').remove();
					$('#textarea').html(result); // redirect script would be loaded here in case user is not logged-in
					$('.cmtReplyControlsDiv').hide();
				} 
			); // post
		} else {
			alert("Please enter your reply before clicking 'Reply' button.");
		}
	});
	
//---------------------------------------------------------	
	// remove empty paragraphs
	function remove_empty_para() {
		
		$.ajaxSetup({async:false});  //execute synchronously
		
		$("p > br").remove(); // remove <br> that is child of <p>
		
		//remove <p> that contain only whitespaces		
		$('#textarea p').filter(function() {
			return $.trim($(this).text()) === '' && $(this).children().length == 0
		}).remove();		
		
		$("#textarea p:empty").remove(); //remove <p> that are empty
		
		$.ajaxSetup({async:true});  //return to default setting
				
	}
	
	