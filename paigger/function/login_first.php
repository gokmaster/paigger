<?php
	if(!isset($_SESSION)){session_start();}
	// if not logged-in
	if(!isset($_SESSION["user_id"]) ) {
		$_SESSION["goto_url"] = $_SESSION["current_url"];
		echo "
		<script>
			window.location.href = '../login_form.php';
		</script>
		
		";
		exit();
	}
		
?>