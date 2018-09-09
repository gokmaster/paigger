
	// When Follow button is clicked
    function follow() {
		// loading 
		$("#btnFollow").prepend("<div class=loadingDiv ></div>");
		
        var hidden_id = $("#hidden_input").val();
		
		$.post("function/add_follower_to_DB.php", 
				{id: hidden_id}, 
				function(result){ 
					$("#followers").html(result); }
		); //$.post
	}
	
	
	 function unfollow() {
		// loading 
		$("#btnUnfollow").prepend("<div class=loadingDiv ></div>");
		
        var hidden_id = $("#hidden_input").val();
		
		$.post("function/remove_follower_from_DB.php", 
				{id: hidden_id}, 
				function(result){ 
					$("#followers").html(result); }
		); //$.post
    }
	


