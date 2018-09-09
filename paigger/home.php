<?php
	session_start();
	
  //Buffer larger content areas like the main page content
  ob_start();

?>

<div class="content">
	
	<div class='suggested_pages_div' >
		<?php
			include "function/suggested_pages.php";
		?>
	</div>
		
</div> <!-- class=content -->

	
	
<script type="text/javascript" src="js/invisible_index.js" ></script>
	
	
	
		
		

<?php
	  //Assign all Page Specific variables
	  $MainContent = ob_get_contents();
	  ob_end_clean();
	  $title = "Paigger";
	  
	  
	  
	  $rightContent = " 
		
	  ";
	  
	  

	  
	  //Apply the template
      include("masterpage.php");
      echo $masterContent; // defined in masterpage.php
	?>