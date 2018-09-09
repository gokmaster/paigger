<?php
	if(!isset($_SESSION)){session_start();}
		
	include_once "login_first.php"; // check if user is logged-in
	
	if (!isset($_POST['txtpword'])){
		echo "Password required";
		exit;
	}
	
	$pword_entered = md5($_POST['txtpword']);
	
	include_once "function_get_pword.php";
	
	$pword_in_DB = pword_from_DB();
	
	// if password entered matches password in database
	if ($pword_entered == $pword_in_DB) {
								
		include_once "function_delete_all.php"; // contains functions for deleting all contents of user
		
		delete_pages();
		delete_page_likes();
		delete_join_group_requests();
		delete_comments();
		delete_follows();
		delete_grp_members();	
		delete_replies();
		
		// if images are successfully deleted from server, then delete those images' records from database
		if (delete_images_from_server()) {
			delete_images_from_DB();
		}
		
		// if user account is successfully deleted, then logout user
		if (delete_user_account()) {
			echo "Your account has been successfully deleted";
			include_once "logout.php";
		} else {
			echo "Your account could not be deleted.";
		}
	
	} else {
		echo "Incorrect password";
	}
	
	
	
	
	
		 
	
?> 