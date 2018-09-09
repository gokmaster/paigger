<?php
    if(!isset($_SESSION)){session_start();}
     
  //Buffer larger content areas like the main page content
  ob_start();
  
	//retrieve file containing database connection
	include "function/dbconn.php";
?>

<div class="content">
	<h1>My Pages</h1>
	<?php
		
			
		if(isset($_SESSION["user_id"]) )
		{
			$user_id = $_SESSION["user_id"];
					
		 // prepared statements is used to prevent sql injection
			// prepare and bind
			$stmt = mysqli_prepare($con, "SELECT pageid,page_title,page_date FROM page WHERE user_id = ? ORDER BY page_date DESC");
			mysqli_stmt_bind_param($stmt, "i", $user_id); //s = string, d = double, i = integer

			// execute query
			mysqli_stmt_execute($stmt);
			
			//bind the result of that query to variables
			mysqli_stmt_bind_result($stmt, $pageid,$pagetitle,$pagedate);
			
			$count = 0;
			
			while (mysqli_stmt_fetch($stmt)) {
				$count = $count + 1;
				
				// date is converted to desired format
				include_once "function/formatted_date_function.php";
				$formatted_date = format_date($pagedate);
				
				echo "
				<div class=page>
				<span class=smalltext>$formatted_date</span>
				<br><a href=pageview.php?pageid=$pageid ><b>$pagetitle</b></a>
				
				
				</div>
				";
			}
			
			if ($count == 0) {
				echo "You have not created any pages.";
			}
			
			mysqli_stmt_close($stmt);
			mysqli_close($con);
		
		} else {
			echo "You need to <a href=login_form.php >login</a> in order to see your pages.";
		}
	?>
</div> <!-- class=content -->



<?php
	  //Assign all Page Specific variables
	  $MainContent = ob_get_contents();
	  ob_end_clean();
	  $title = "Paigger: My Pages";
	  
	  $style = "
	
	";
	    

	  
	  //Apply the template
      include("masterpage.php");
      echo $masterContent; // defined in masterpage.php
?>