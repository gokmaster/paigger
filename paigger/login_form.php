<?php
	session_start();
  //Buffer larger content areas like the main page content
  ob_start();

?>
<div class="content">

	<div class="vertical_form_box">
		<h1>Login to continue</h1>
		
			<input type="email" id="email" name="txtemail" placeholder="Email" required /> <br><br>
			<input type="password" id="pword" name="txtpword" placeholder="Password" required /> <br><br>
			<button id="btnLogin" class='btnLarge' >Login</button> <br><br>
		
		
		<a class="smalltext" href="signup_form.php" >Don't have a Paigger account? Create your account here.</a>
				
	</div>
	
	
	<div id="login-result-div">
		
				
	</div>
	
</div> <!-- class=content -->


	
<script type="text/javascript" src="js/invisible_login_form.js" ></script>
	


<?php
	  //Assign all Page Specific variables
	  $MainContent = ob_get_contents();
	  ob_end_clean();
      $title = "Paigger: Log In";
      
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