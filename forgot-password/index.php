<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// If necessary, modify the path in the require statement below to refer to the
// location of your Composer autoload.php file.
require './vendor/autoload.php';
require_once ".env.users.php";

// create a DB connection 
// start connection
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
if(!$con)
	exit("<p>Connection Error: " . mysqli_connect_error() . "</p>");
//if we are given an email 
if(isset($_POST["email"]) && (!empty($_POST["email"]))){
	$email = $_POST["email"];
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	$email = filter_var($email, FILTER_VALIDATE_EMAIL);
	// if the email is invalid
	if (!$email) {
		exit("<p>Invalid email address please type a valid email address!</p>");
	}
	else{
		$sel_query = "SELECT * FROM `users` WHERE email='".$email."'";
		$results = mysqli_query($con,$sel_query);
		$row = mysqli_num_rows($results);
		if ($row==""){
			exit("<p>No user is registered with this email address!</p>");
		}
	}

	$output='<p>Dear user,</p>';
	$output.='<p>Please click on the following link to reset your password.</p>';
	$output.='<p>-------------------------------------------------------------</p>';
	$output.='<p><a href="http://ec2-54-172-16-142.compute-1.amazonaws.com//forgot-password/reset-password.php?
		email='.$email.'&action=reset" target="_blank">
		http://ec2-54-172-16-142.compute-1.amazonaws.com//forgot-password/reset-password.php
	?email='.$email.'&action=reset</a></p>';
	$output.='<p>-------------------------------------------------------------</p>';
	$output.='<p>Please be sure to copy the entire link into your browser.</p>';
	$output.='<p>If you did not request this forgotten password email, no action
		is needed, your password will not be reset. However, you may want to log into
		your account and change your security password as someone may have guessed it.</p>';
	$output.='<p>Thank you,</p>';
	$output.='<p>HugWithMug Team</p>';
	$body = $output;
	$subject = "Password Recovery - HugWithMug Company";


	// Replace sender@example.com with your "From" address.
	// This address must be verified with Amazon SES.
	$sender = 'hugwithmugco@gmail.com';
	$senderName = 'HugWithMugCo';

	// Replace recipient@example.com with a "To" address. If your account
	// is still in the sandbox, this address must be verified.
	$recipient = 'kassiejgarcia@gmail.com'; //this is where a given user's email would go, but since this is a student project, it is not
	// approved for production access and therefore i cannot send out emails to unverified addresses

	// Replace smtp_username with your Amazon SES SMTP user name.
	$usernameSmtp = 'AKIASHWRAFECHYL2CSEP';

	// Replace smtp_password with your Amazon SES SMTP password.
	$passwordSmtp = 'BLquyd0DkIMwcZgvpDx7XytfRHg0K7eeAkUwaC9YKe6O';

	// Specify a configuration set. If you do not want to use a configuration
	// set, comment or remove the next line.
	//$configurationSet = 'ConfigSet';

	// If you're using Amazon SES in a region other than US West (Oregon),
	// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP
	// endpoint in the appropriate region.
	$host = 'email-smtp.us-east-1.amazonaws.com';
	$port = 587;

	// The subject line of the email
	$subject = 'Test Subject';

	// The plain-text body of the email
	$bodyText =  "";

	// The HTML-formatted body of the email
	//$bodyHtml = '-- Put body html here --';

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
		//   $mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);

		// Specify the message recipients.
		$mail->addAddress($recipient);
		// You can also add CC, BCC, and additional To recipients here.

		// Specify the content of the message.
		$mail->isHTML(true);
		$mail->Subject    = $subject;
		$mail->Body       = $body;
		//  $mail->AltBody    = $bodyText;
		$mail->Send();
		echo "Email sent!" , PHP_EOL;
	} catch (phpmailerException $e) {
		echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
	} catch (Exception $e) {
		echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
	}
	mysqli_close($con);
}
else{
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
