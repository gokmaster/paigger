<?php
  //Buffer larger content areas like the main page content
  ob_start();

?>

<div class="content">
<?php
	// this php script is called when user clicks confirmation link sent to his email
	
	//retrieve file containing database connection
	include "dbconn.php";
	
	
	$verifyemail = $_GET['passkey'];
	
	
	$stmt = mysqli_prepare($con, 
		"UPDATE p_user
		SET verify_email=\"complete\"
		WHERE verify_email= ? ");
	mysqli_stmt_bind_param($stmt, "s", $verifyemail); //s = string, d = double, i = integer

	// execute query
	if (mysqli_stmt_execute($stmt))
	{			
	echo "Your email address has been verified. <br><br>
			Click here to <a href = \"../login_form.php\">Login</a>.
		</b>";
	} else
	{
	echo "Error: Your email address could not be verified.";
	}
		
	mysqli_stmt_close($stmt);
	mysqli_close($con);
?> 

</div> <!-- class=content -->



<?php
	  //Assign all Page Specific variables
	  $MainContent = ob_get_contents();
	  ob_end_clean();
	  $title = "Paigger: Email Verified";
	  
	  
	  
	  $rightContent = " 
		
	  ";
	  
	  

	  
	  //Apply the template
	  include("../masterpage.php");
	?>