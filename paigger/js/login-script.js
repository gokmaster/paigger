
$(document).ready(function(){
	
	$('#email').keypress(function(event){
		// keyCode == 13 represents Enter button
	  if(event.keyCode == 13){
		$('#btnLogin').click();
	  }
	});
	
	$('#pword').keypress(function(event){
		// keyCode == 13 represents Enter button
	  if(event.keyCode == 13){
		$('#btnLogin').click();
	  }
	});

	// when login button is clicked
    $("#btnLogin").click(function(){
        
		var email = $("#email").val();
		var pword = $("#pword").val();
				
		// && represents AND
		if (email != null && email != ""
			&& pword != null && pword != "")
			{
				$("#login-result-div").html("Processing your information. Please wait...");
				
				$.post("function/login.php", 
						{txtemail: email, txtpword: pword}, 
						function(result){ 
							$("#login-result-div").html(result);
								
						} //function(result)
												
				); //$.post
													
		} else {
		 $("#login-result-div").html("<span class=\"red\">Please fill in your email and password.</span>");
		}
    }); //btnLogin.click
	
}); //document.ready