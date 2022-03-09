<?php
require_once ".env.users.php";
// start connection
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
if(!$con)
	exit("<p>Connection Error: " . mysqli_connect_error() . "</p>");
date_default_timezone_set('America/Chicago');
$error="";
if(isset($_POST["email"]) && (!empty($_POST["email"]))){
	$email = $_POST["email"];
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	$email = filter_var($email, FILTER_VALIDATE_EMAIL);
	if (!$email) {
		$error .="<p>The format of the email given is invalid.</p>";
	}else{
		$sel_query = "SELECT * FROM users WHERE email='".$email."'";
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
			"INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
			VALUES ('".$email."', '".$key."', '".$expDate."');");

		$output='<p>Dear user,</p>';
		$output.='<p>Please click on the following link to reset your password.</p>';
		$output.='<p>-------------------------------------------------------------</p>';
		$output.='<p><a href="reset-password.php?
			key='.$key.'&email='.$email.'&action=reset" target="_blank">
			reset-password.php
			?key='.$key.'&email='.$email.'&action=reset</a></p>';		
		$output.='<p>-------------------------------------------------------------</p>';
		$output.='<p>Please be sure to copy the entire link into your browser.
			The link will expire after 1 day for security reason.</p>';
		$body = $output; 
		$subject = "Password Recovery - Hug With Mug eCommerce Website";

		$email_to = $email;
		$fromserver = "noreply@yourwebsite.com"; 
		require("PHPMailer/PHPMailerAutoload.php");
		$mail = new PHPMailer();
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
		}
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
