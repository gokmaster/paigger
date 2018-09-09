
$(document).ready(function(){
	// When button is clicked
    $("#btnCreateGroup").click(function(){
        var group_name = $("#txtgrpname").val();
		var privacy = $('input:radio[name=privacy]:checked').val();
		
		// && represents AND
		if (group_name != null && group_name != "" ) {
				$("#result-div").html("Processing your information. Please wait...");
				$.post("function/creategroup_to_DB.php", 
						{grp_name: group_name, grp_privacy: privacy}, 
						function(result){ 
							$("#result-div").html(result); }
				); //$.post
		} else {
			$("#result-div").html("<span class=red >Error: Group name is required</span>");
		}
    }); //btnCreateAccount.click
	

	
}); //document.ready
