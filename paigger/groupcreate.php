<?php
	session_start();
	
	if ( !isset($_SESSION["user_id"]) )
		{
		// redirect to login page
		 header('Location: login_form.php');
		  exit;
		}
	
  //Buffer larger content areas like the main page content
  ob_start();

?>

<div class="content">

    <div class="page">

	    <h1>Create a New Group</h1>
		
		<input type="text" id="txtgrpname" name="txtgrpname" placeholder="Group Name" maxlength="60" required /> 
		<br><br> 
		
		<b>Group Privacy</b><br>
		<div class='radio_div' >
			<label>
				<input type="radio" name="privacy" value="public" checked> Public<br>
				<span class='smalltext'>The group, its members, and content posted in the group is visible to anyone.</span>
			</label>
		</div>
		
		<div class='radio_div' >
			<label>
				<input type="radio" name="privacy" value="closed"> Closed<br>
				<span class='smalltext'>Anyone can find the group, but only its members can see content posted in the group.
				</span>
			</label>
		</div>
		<br/>
		
		<button id="btnCreateGroup" >Create Group</button>
				
	</div><!-- class=page -->
	
	
	<div id="result-div">
		
				
	</div>
	
</div> <!-- class=content -->


	
<script type="text/javascript" src="js/invisible_groupcreate.js" ></script>
	

<?php
	  //Assign all Page Specific variables
	  $MainContent = ob_get_contents();
	  ob_end_clean();
	  $title = "Paigger: Create Group";
	  
	  
	  
	  $rightContent = " 
		
	  ";
	  
	  

	  
	  //Apply the template
      include("masterpage.php");
      echo $masterContent; // defined in masterpage.php
	?>