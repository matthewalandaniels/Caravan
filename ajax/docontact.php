<?php
	// Ajax helper to validate the contents of a contact form and send an email
	if ($_SERVER['REQUEST_METHOD'] === 'POST') { // meant for ajax requests
		$name        = $_post['name'];
		$phone       = $_post['phone'];
		$email       = $_post['email'];
		$weddingDate = $_post['weddingDate'];
		$comments    = $_post['comments'];
		
		// todo: validate contents
		
		// todo: compose and send email
		$to      = 'noamkatz@hotmail.com';
		$subject = "[contact form]: $name <$email>";
		$message = 
		'The following message was sent from the contact form at ' . date("F j, Y, g:i a") . ':' .
		"\r\n" .
		"Name: $name" . "\r\n" .
		"Phone: $phone" . "\r\n" .
		"Wedding Date: $weddingDate" . "\r\n\r\n" .
		"Comments: $comments" . "\r\n\r\n" . 
		"Sent from IP " . $_SERVER['REMOTE_ADDR'];
		$headers = 'From: ' . $email . "\r\n" .
			'Reply-To: ' . $email . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
		
		if (mail($to, $subject, $message, $headers)) {
			echo 1;
		}else {
			echo 0;
		};
		
		
	}

?>