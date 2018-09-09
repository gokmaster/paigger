	
	function showHomeDiv()	{
		$("#grp_members_div").hide();
		$("#grp_home_div").show();
		
		$("#btnGrpHome").attr('disabled' , true);
		$("#btnGrpMembers").attr('disabled' , false);	
	}

	function showMembersDiv()	{
		$("#grp_home_div").hide();
		$("#grp_members_div").show();
		
		$("#btnGrpMembers").attr('disabled' , true);
		$("#btnGrpHome").attr('disabled' , false);	
	}
	
	// When join-group button is clicked
	function joinGroupRequest()	{
		
		// loading 
		$("#joingroup").html("<div class=loadingDiv ></div>");
		
        var hidden_id = $("#hidden_input").val();
		
		$.post("function/join_group_request.php", 
				{group_id: hidden_id}, 
				function(result){ 
					$("#joingroup").html(result); }
		); //$.post
	
	}
	
	function showLeaveGroupDialogBox() {
		$("#leaveGroupDialogBox").show();
	}
	
	function hideLeaveGroupDialogBox() {
		$("#leaveGroupDialogBox").hide();
	}
	
	function leaveGroup() {
		$("#leaveGroupDialogBox").html('<div class=loadingDiv ></div>');	    
        var hidden_id = $("#hidden_input").val();
		
		$.post("function/leave_group.php", 
				{group_id: hidden_id}, 
				function(result){ 
					$("#leaveGroupDialogBox").html(result); 
					$("#joingroup").load(location.href + " #joingroup"); //refresh div
				}
		); //$.post
	
	}
	
	function accept_user_into_group(button_element)	{
					
        var hidden_id = $("#hidden_input").val();
		var pending_user_id = $(button_element).parent().find(".hidden_user_id").val();
		
		// loading 
		$(button_element).html("<div class=loadingDiv ></div>");
		
		$.post("function/add_user_to_group.php", 
				{group_id: hidden_id, pending_grp_user: pending_user_id}, 
				function(result){ 
					$(button_element).parent().html(result); }
		); //$.post
	
	}
	
	function ignoreJoinGroupRequest(button_element)	{
					
        var hidden_id = $("#hidden_input").val();
		var pending_user_id = $(button_element).parent().find(".hidden_user_id").val();
		
		// loading 
		$(button_element).html("<div class=loadingDiv ></div>");
		
		$.post("function/remove_joinGroup_request.php", 
				{group_id: hidden_id, pending_grp_user: pending_user_id}, 
				function(result){ 
					$(button_element).parent().html(result); }
		); //$.post
	
	}
	
	
	