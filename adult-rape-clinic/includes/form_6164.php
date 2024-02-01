<?php	
	if (empty($_POST['name_23799_6164']) && strlen($_POST['name_23799_6164']) == 0 || empty($_POST['email_23799_6164']) && strlen($_POST['email_23799_6164']) == 0 || empty($_POST['message_23799_6164']) && strlen($_POST['message_23799_6164']) == 0)
	{
		return false;
	}
	
	$name_23799_6164 = $_POST['name_23799_6164'];
	$email_23799_6164 = $_POST['email_23799_6164'];
	$message_23799_6164 = $_POST['message_23799_6164'];
	$optin_23799_6164 = $_POST['optin_23799_6164'];
	
	$to = 'info@arc.co.zw'; // Email submissions are sent to this email

	// Capture
	$secretKey = '';
    $captcha = $_POST['g-recaptcha-response'];

    if (!$captcha)
    {
    	echo 'capture-error';
    	exit;
    }

	// Capture
	$ip = $_SERVER['REMOTE_ADDR'];
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
    $responseKeys = json_decode($response,true);

    if (intval($responseKeys["success"]) !== 1)
    {
    	echo 'capture-connection-error';
    	exit;
    }
    else
    {   
    	// Create email	
		$email_subject = "Message from website.";
		$email_body = "You have received a new message. \n\n".
		"Name_23799_6164: $name_23799_6164 \nEmail_23799_6164: $email_23799_6164 \nMessage_23799_6164: $message_23799_6164 \nOptin_23799_6164: $optin_23799_6164 \n";
		$headers = "MIME-Version: 1.0\r\nContent-type: text/plain; charset=UTF-8\r\n";	
		$headers .= "From: euginius.makaya@gmail.com\r\n";
		$headers .= "Reply-To: $email_23799_6164";	
	
		mail($to,$email_subject,$email_body,$headers); // Post message
    }			
?>
