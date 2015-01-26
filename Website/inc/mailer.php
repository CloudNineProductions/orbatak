<?php 	

// This is the email for the administrator of the web site
	$adminEmail = "kumo.cloud@gmail.com";
	
	//Checks to see if the user has submitted a HTML for with a POST method 
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		// Working Variables for the user input fields
		$name = trim($_POST["name"]);
		$email = trim($_POST["email"]);
		$message = trim($_POST["message"]);
		$subscribe = trim($_POST["subscribe"]);
		
		
	
		// Check if the name field has been set by the user
		if($name==""){
			// the name field is empty, Set the Error Message for the user
			$errorMsg= 'Oops! What went wrong? Hmmm, let&rsquo;s see... Aha! Looks like you forgot to enter your <strong>Name</strong>.';
		}
		// Check if the email field has been set by the user
		else if ($email==""){
			// the email field is empty, Set the Error Message for the user
			$errorMsg ='Oops! What went wrong? Hmmm, let&rsquo;s see... Aha! Looks like you forgot to enter your <strong>Email</strong>.';
		}
		// Check if the message field has been set by the user
		else if ($message==""){
			// the message field is empty, Set the Error Message for the user
			$errorMsg = 'Oops! What went wrong? Hmmm, let&rsquo;s see... Aha! Looks like you forgot to enter your <strong>Message</strong>.';
		}
		// Check if error is already thrown
		else if (!isset($errorMsg)){
			// Check the  Spam Honey Pot 'address' input field to see if we caught a fly in our trap
			// Minor security feature to protect against spam robots sending us junk mail
			if (trim($_POST["address"])!=""){
				//Set the error msg
				$errorMsg ='Looks like there is an evil spam robot in an invisible box... WATCH OUT! *BBZzzZAAP!! I got, it&rsquo;s safe now :)';
			}
			// Standard security feature to protect forms from Spam Bots hijacking this form
			// and sending people spam emails
			// iterates through all $_POST variables 
			foreach ( $_POST as $value) {
				// Strips the normal input values from $_POST variables 
				// and insures there is nothing "Extra" in the form
				if( stripos($value, 'Content-Type:') !== FALSE ){
					// Set the error message
					$errorMsg ='Looks like there is an evil spam robot in the vicinity... WATCH OUT! *BBZzzZAAP!! I got, it&rsquo;s safe now :)';
				}
			}
		}
		
		// including the PHP Mailer extension 
		require_once(ROOT_PATH."inc/phpmailer/class.phpmailer.php");
		// Creates a new phpMailer object
		$mail = new PHPMailer();
		// Check if error is already thrown
		if (!isset($errorMsg)){
	
			// Check if the users' email input  is valid
			if (!$mail ->ValidateAddress($email)){
				//Set error message
				$errorMsg = 'Sorry we can&#39;t find that email address any where on the whole internet.';
			}
			else {
				// Check if subscribed check box returns 'Yes'
				if ($subscribe == 'Yes') {
					// send email and name to database
					addToEmailList($name, $email, $servername, $dbname, $username,$adminPassword);
				}
				
			}
		}
		
		// Checks if any error messages have been set off by the form
		// If no errors are thrown, compose the email message, and try to send it
		if (!isset($errorMsg)){
	
			// Instantiate body of the email text
			$emailBody = "";
			// Concatenate input values into the body of the email
			$emailBody = $emailBody."Name:".$name."\n";
			$emailBody = $emailBody."Email: ".$email."\n";
			$emailBody = $emailBody."Message: ".$message."\n";
			
			// Set the Reply and From email address
			$mail->AddReplyTo($email,$name);
			$mail->SetFrom($email,$name);
			// Add the To: address
			$mail ->AddAddress($adminEmail,"Cloudy");
			// Subject eh subject of the email
			$mail->Subject = "User Msg from OrbAtak.com ".$name;
			// Set the body of the email text in HTML formatting
			$mail->MsgHTML($emailBody);
			
			// Check if the send worked
			if ($mail->Send()){
				echo "Email Sent!";
				// It worked!  redirect to the Thank You page
				header("Location: " . BASE_URL . "contact/thanks/");
				exit;
			}
			else { 
				// Set error message
				$errorMsg ='Oops, the Mailer could not send that message.'.$mail->ErrorInfo;
			}		
		}		
	}

?>