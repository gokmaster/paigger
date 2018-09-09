<?php
	// this php script is called by signup_to_DB.php
	
	 // --------- Send confirmation link to user_email ------------

$verify_email = md5($user_email); 
	 
// send e-mail to ...
$to = $user_email;

// Your subject
$subject="Paigger.com: Activate your account by verifying your email address.";

// From
$header="From: Paigger.com <noreply@paigger.com> ";

// Your message
$message="You are receiving this email because you created an account at paigger.com. \r\n";
$message.="Click on this link to activate your account: \r\n";
$message.="http://www.paigger.com/function/confirm_email.php?passkey=$verify_email \r\n \r\n";
$message.= "If you did not create an account at paigger.com and you think this email was sent to you in error, simply ignore this email. \r\n \r\n";
$message.= "Thanks, \r\n";
$message.= "The Paigger Team";

// send email
$sentmail = mail($to,$subject,$message,$header);





// if your email succesfully sent
if($sentmail){
echo "A confirmation link has been sent to $to. <br><br>
	Please click on the confirmation link sent to your email to finish the sign-up process.
	(Check the Spam/Junk folder, if you don't find it in your Inbox.)";
}
else {
echo "Cannot send Confirmation link to $to";
}

?> 