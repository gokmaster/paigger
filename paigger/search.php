<?php
	session_start();
	
  //Buffer larger content areas like the main page content
  ob_start();
  
	$searchTerm = $_GET['txtSearch'];
	$searchTerm = trim($searchTerm," "); // remove whitespaces from beginning and end of string
	//$searchTerm = filter_var($searchTerm, FILTER_SANITIZE_STRING); // remove all HTML tags from string
	
	//Convert all applicable characters to HTML entities to prevent browser from rendering it as html
	$searchTerm = htmlentities($searchTerm, ENT_QUOTES); 
  
	include "function/dbconn.php";

	// prepare and bind
	$stmt = mysqli_prepare($con, "SELECT pageid,page_title,content FROM page WHERE ((content LIKE ?) OR (page_title LIKE ?)) AND (audience <> 'only me') ORDER BY likes DESC");
	mysqli_stmt_bind_param($stmt, "ss", $content_keyword, $title_keyword ); //s = string, d = double, i = integer
	
	$content_keyword = "%" . $searchTerm . "%";
	$title_keyword = "%" . $searchTerm . "%";
	
	// execute query
	mysqli_stmt_execute($stmt);

	// store result (this is needed in order for longtext field to not be empty when binded to variable)
	mysqli_stmt_store_result($stmt);

	//bind the result of that query to variables
	mysqli_stmt_bind_result($stmt, $pageid,$pagetitle,$pagecontent);

	$rowCount = mysqli_stmt_num_rows( $stmt );



	

?>



<div class="content">

<?php
	 if($rowCount > 0){	
	 
		include "function/limit_words_function.php";
		
		while (mysqli_stmt_fetch($stmt)) {
			//limit the amount of words to be displayed
			$shorten_content = limit_words($pagecontent);
						
			echo "
			<div class=page>
			<a href=pageview.php?pageid=$pageid ><b>$pagetitle</b></a>
			<br>$shorten_content 
						
			</div>
			";
		} //while

		
	 
	} else {
		echo "No results found that matches <b>$searchTerm</b>.";
	}

	mysqli_stmt_close($stmt);
?>
	
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