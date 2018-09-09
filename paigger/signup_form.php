<?php
	
  //Buffer larger content areas like the main page content
  ob_start();

?>
<div class="content">

	<div class="vertical_form_box" >
        <h1>Create Account</h1>
		
		<input type="text" id="txtfname" name="txtfname" placeholder="First Name" maxlength="20" required /> <br> 
		<input type="text" id="txtlname" name="txtlname" placeholder="Last Name" maxlength="20" required /> <br><br>
		<input type="email" id="txtemail" name="txtemail" placeholder="Email" maxlength="50" required /> <br> 
		<input type="email" id="txtemail2" name="txtemail2" placeholder="Re-enter Email"  maxlength="50" required /> <br>
		<span id="email_status"></span> <br>
		<input type="password" id="txtpword" name="txtpword" placeholder="Password" maxlength="50" required /> <br> 
		<input type="password" id="txtpword2" id="txtpword2" placeholder="Confirm Password" maxlength="50" required /> <br>
		<span id="pword_status"></span> <br>
		
	<span class="smalltext">
	By clicking 'Create Account', you confirm that you are at least 13 years old and agree to Paigger’s Terms of Use.
	</span><br><br>
		<button id="btnCreateAccount" class='btnLarge' >Create Account</button>
				
	</div>
	
	
	<div id="result-div">
		
				
	</div>
</div> <!-- class=content -->



<script type="text/javascript" src="js/invisible_signup_form.js" ></script>
			

<?php
	  //Assign all Page Specific variables
	  $MainContent = ob_get_contents();
	  ob_end_clean();
	  $title = "Paigger: Create Account";
      
      $style = "

        body {
            background-image: url('./image/icon/site-background.png');
            background-size: 100%;
        }
      ";
	 
	  
	  $rightContent = " 
		
	  ";
	  
	  

	  
	  //Apply the template
      include("masterpage.php");
      echo $masterContent; // defined in masterpage.php
?>