	
	// when delete button is clicked
    $("#btnDeleteAccount").click(function(){
        
		var pword = $("#txtDeleteAccountPword").val();
				
		if (pword != null && pword != "") {
		
			$("#delAccountResultDiv").html('<div class=loadingDiv ></div> Deleting account. Please wait...');
			$.post("function/deleteAccount.php",
				{txtpword: pword}, 
				function(result){ 
						$("#delAccountResultDiv").html(result); 
						}
			); //post	
													
		} else {
			$("#delAccountResultDiv").html("Password required.");
		}
    }); //btnLogin.click
	
		
	
	// show div
	function showDeleteAccountDiv() {
		
		$("#deleteAccountDiv").show();		
	}
	
	
	// hide div
	function hideDeleteAccountDiv() {
		
		$("#deleteAccountDiv").hide();
		$("#delAccountResultDiv").html(""); // clear div
		$("#txtDeleteAccountPword").val(""); // clear password textbox
	}