//input_error is a global variable
var input_error  = "yes";

// validate email
var email = document.getElementById("txtemail");
var email2 = document.getElementById("txtemail2");

function validateEmail(){
  if (email.value != email2.value) {
    email2.setCustomValidity("Emails you entered Don't Match");
	$("#email_status").html("Emails you entered Don't Match");
	input_error  = "yes";
  } else {
   email2.setCustomValidity('');
   $("#email_status").html("");
   input_error  = "no";
  }
}

email.onchange = validateEmail;
email2.onkeyup = validateEmail;
// validate email


// validate password
var password = document.getElementById("txtpword");
var confirm_password = document.getElementById("txtpword2");

function validatePassword(){
  if (password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords you entered Don't Match");
	$("#pword_status").html("Passwords you entered Don't Match");
	input_error  = "yes";
  } else {
    confirm_password.setCustomValidity('');
	$("#pword_status").html("");
	input_error  = "no";
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
// validate password

$(document).ready(function(){
	// When Create Account button is clicked
    $("#btnCreateAccount").click(function(){
        var fname = $("#txtfname").val();
		var lname = $("#txtlname").val();
		var email = $("#txtemail").val();
		var email2 = $("#txtemail2").val();
		var pword = $("#txtpword").val();
		var pword2 = $("#txtpword2").val();
		
		// && represents AND
		if (fname != null && fname != "" 
			&& lname != null && lname != ""
			&& email != null && email != ""
			&& email2 != null && email2 != ""
			&& pword != null && pword != ""
			&& pword2 != null && pword2 != "" 
			&& input_error  == "no") {
				$("#result-div").html("Processing your information. Please wait...");
				$.post("function/signup_to_DB.php", 
						{txtfname: fname, txtlname: lname, txtemail: email, txtpword: pword}, 
						function(result){ 
							$("#result-div").html(result); }
				); //$.post
		} // if
    }); //btnCreateAccount.click
	

	
}); //document.ready
