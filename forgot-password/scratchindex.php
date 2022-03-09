<?php
require_once ".env.users.php";
// start connection
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
if(mysqli_connect_errno()){
	exit("<p>Connection Error: " . mysqli_connect_error() . "</p>");
}
date_default_timezone_set('America/Chicago');
$error="";

if(isset($_POST["email"]) && (!empty($_POST["email"]))){
	$email = $_POST["email"];
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	$email = filter_var($email, FILTER_VALIDATE_EMAIL);
	if (!$email) {
		$error .="<p>The format of the email given is invalid.</p>";
	}else{
		$sel_query = "SELECT * FROM `users` WHERE email='".$email."'";
		$results = mysqli_query($con,$sel_query);
		$row = mysqli_num_rows($results);
		if ($row==""){
			$error .= "<p>Unable to find a username with this corresponding email address.</p>";
		}
	}

	if($error!=""){
		echo "<div class='error'>".$error."</div>
			<br /><a href='javascript:history.go(-1)'>Go Back</a>";
	}else{
		$expFormat = mktime(
			date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
		);
		$expDate = date("Y-m-d H:i:s",$expFormat);
		$key = md5(2418*2+$email);
		$addKey = substr(md5(uniqid(rand(),1)),3,10);
		$key = $key . $addKey;
		// Insert Temp Table
		mysqli_query($con,
			"INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('".$email."', '".$key."', '".$expDate."');");
// Replace sender@example.com with your "From" address.
// This address must be verified with Amazon SES.
$sender = 'hugwithmugco@gmail.com';
$senderName = 'Hug With Mug';

// Replace recipient@example.com with a "To" address. If your account
// is still in the sandbox, this address must be verified.
$recipient = "$email";

// Replace smtp_username with your Amazon SES SMTP user name.
$usernameSmtp = 'AKIASHWRAFECPVEENUCM';

// Replace smtp_password with your Amazon SES SMTP password.
$passwordSmtp = 'BF00V+jkw6D3S52JFfn//ECjINa7gj8ZaHklqXR9NTvw';

// Specify a configuration set. If you do not want to use a configuration
// set, comment or remove the next line.
$configurationSet = 'ConfigSet';

// If you're using Amazon SES in a region other than US West (Oregon),
// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP
// endpoint in the appropriate region.
$host = 'email-smtp.us-east-1.amazonaws.com';
$port = 587;

// The subject line of the email
$subject = 'Amazon SES test (SMTP interface accessed using PHP)';

// The plain-text body of the email
$bodyText =  "Email Test\r\nThis email was sent through the
    Amazon SES SMTP interface using the PHPMailer class.";

// The HTML-formatted body of the email
$bodyHtml = '<h1>Email Test</h1>
    <p>This email was sent through the
    <a href="https://aws.amazon.com/ses">Amazon SES</a> SMTP
    interface using the <a href="https://github.com/PHPMailer/PHPMailer">
    PHPMailer</a> class.</p>';
require "/var/www/html/Software-Engineering-Project/PHPMailer/PHPMailerAutoload.php";
$mail = new PHPMailer(true);

try {
    // Specify the SMTP settings.
    $mail->isSMTP();
    $mail->setFrom($sender, $senderName);
    $mail->Username   = $usernameSmtp;
    $mail->Password   = $passwordSmtp;
    $mail->Host       = $host;
    $mail->Port       = $port;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = 'tls';
    $mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);

    // Specify the message recipients.
    $mail->addAddress($recipient);
    // You can also add CC, BCC, and additional To recipients here.

    // Specify the content of the message.
    $mail->isHTML(true);
    $mail->Subject    = $subject;
    $mail->Body       = $bodyHtml;
    $mail->AltBody    = $bodyText;
    $mail->Send();
    echo "Email sent!" , PHP_EOL;
} catch (phpmailerException $e) {
    echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
} catch (Exception $e) {
    echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
}


/*		$output='<p>Dear user,</p>';
		$output.='<p>Please click on the following link to reset your password.</p>';
		$output.='<p>-------------------------------------------------------------</p>';
		$output.='<p><a href="http://ec2-54-172-16-142.compute-1.amazonaws.com/forgot-password/reset-password.php?
			key='.$key.'&email='.$email.'&action=reset" target="_blank">
			http://ec2-54-172-16-142.compute-1.amazonaws.com/forgot-password/reset-password.php
			?key='.$key.'&email='.$email.'&action=reset</a></p>';		
		$output.='<p>-------------------------------------------------------------</p>';
		$output.='<p>Please be sure to copy the entire link into your browser.
			The link will expire after 1 day for security reason.</p>';
		$body = $output; 
		$subject = "Password Recovery - Hug With Mug eCommerce Website";

		$email_to = $email;
		$fromserver = "hugwithmugco@gmail.com"; 
		require("/var/www/html/Software-Engineering-Project/PHPMailer/PHPMailerAutoload.php");
		/*$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->Host = "mail.google.com"; // Enter your host here
		$mail->SMTPAuth = true;
		$mail->Username = "hugwithmugco@gmail.com"; // Enter your email here
		$mail->Password = "UTSA2022se!"; //Enter your password here
		$mail->Port = 25;
		$mail->IsHTML(true);
		$mail->From = "hugwithmugco@gmail.com";
		$mail->FromName = "HugWithMug";
		$mail->Sender = $fromserver; // indicates ReturnPath header
		$mail->Subject = $subject;
		$mail->Body = $body;
		$mail->AddAddress($email_to);
		if(!$mail->Send()){
			echo "Mailer Error: " . $mail->ErrorInfo;
		}else{
			echo "<div class='error'>
				<p>An email has been sent to you with instructions on how to reset your password.</p>
				</div><br /><br /><br />";
}*/
/*		$to = $email;
		$subject = "HugWithMug Password Recovery";
		/*
		$txt = '<p>Dear user,</p><p>Please click on the following link to reset your password.</p><p><a href="http://ec2-54-172-16-142.compute-1.amazonaws.com/forgot-password/reset-password.php?
			key='.$key.'&email='.$email.'&action=reset" target="_blank">
			http://ec2-54-172-16-142.compute-1.amazonaws.com/forgot-password/reset-password.php
		?key='.$key.'&email='.$email.'&action=reset</a></p>';
 *//*
		$message = 'hi';
		$header = "From: hugwithmugco@gmail.com\r\n";
$header.= "MIME-Version: 1.0\r\n";
$header.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$header.= "X-Priority: 1\r\n";

$status = mail($to, $subject, $message, $header);

if($status)
{
    echo '<p>Your mail has been sent!</p>';
} else {
    echo '<p>Something went wrong. Please try again!</p>';
}
 */
	}
}else{
?>
<form method="post" action="" name="reset"><br /><br />
<label><strong>Enter Your Email Address:</strong></label><br /><br />
<input type="email" name="email" placeholder="username@email.com" />
<br /><br />
<input type="submit" value="Reset Password"/>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php } ?>
