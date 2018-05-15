<!-- 3. THIS IS WHERE WE UPDATE THE PASSWORD AFTER CHECKS, THEN
        HEADER TO index.php-->

<?php include "../../../DB/dbinfo.php"; ?>
<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require_once 'PHPMailer/src/Exception.php';
	require_once 'PHPMailer/src/PHPMailer.php';
	require_once 'PHPMailer/src/SMTP.php';

	$connection = mysqli_connect($DBservername, $DBusername, $DBpassword);
	@mysqli_select_db($connection, $DBname);

	if(!$connection){
		header("Location: ../signup.php");
			exit();
	}

    $email = $_POST['recoveryEmail'];
	$recoveryPassword = $_POST['recoveryPassword'];
	$newPassword1 = $_POST['newPassword'];
	$confirmPassword1 = $_POST['confirmPassword'];


	$selectPass = "SELECT password FROM Users WHERE email = '$email'";
  $result = @mysqli_query($connection, $selectPass);
  $row = mysqli_fetch_row($result);
  $pass = $row[0];

	if ($email == '' || $recoveryPassword == '' || $confirmPassword1 == '' || $newPassword1 == ''){
		$updateFailed = true;
		die(header("Location: updatepassword.php?updateFailed=true&reason=blank"));
	 }

    if ($recoveryPassword != $pass){
		$updateFailed = true;
        die(header("Location: updatepassword.php?updateFailed=true&reason=update"));
        //die(header("Location:forgotPassword.php?updateFailed=true&reason=blank"));
	 }
	if ($newPassword1 != $confirmPassword1){
		$updateFailed = true;
		die(header("Location: updatepassword.php?updateFailed=true&reason=match"));
        //die(header("Location:forgotPasswordUpdate.php?updateFailed=true&reason=blank"));
		exit();
	}

		$newPassword = password_hash($newPassword1, PASSWORD_DEFAULT);

		$updatePass = "UPDATE Users SET password ='$newPassword' WHERE email = '$email'";
		$query = mysqli_query($connection, $updatePass);

						//Send an email to the user's current email session for the password update
						$mail2 = new PHPMailer(true);                          // Passing `true` enables exceptions
					    //Server settings
					    $mail2->SMTPDebug = 1;                                 // Enable verbose debug output
					    $mail2->isSMTP();                                      // Set mailer to use SMTP
					    $mail2->Host = "smtp.gmail.com"; 					  // Specify main and backup SMTP servers
					    $mail2->SMTPAuth = true;                               // Enable SMTP authentication
					    $mail2->Username = "reinv3nt.solutions@gmail.com";     // SMTP username
					    $mail2->Password = "helloworld18";                     // SMTP password
					    $mail2->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
					    $mail2->Port = 465;

					    //Recipients
					    $mail2->setFrom('reinv3nt.solutions@gmail.com');
					    $mail2->addAddress($email);     				            // Add a recipient
					    //$mail->addAddress('ellen@example.com');                   // Name is optional
					    //$mail->addReplyTo('info@example.com', 'Information');
					    //$mail->addCC('cc@example.com');
					    //$mail->addBCC('bcc@example.com');

					    //Attachments
					    //$mail->addAttachment('/var/tmp/file.tar.gz');             // Add attachments
					    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');        // Optional name

					    //Content
					    $mail2->isHTML(true);                                        // Set email format to HTML
					    $mail2->Subject = 'Your Trash Tracker password has been changed.';
					    $mail2->Body    = 'Your Trash Tracker password has been changed. If this was not you please contact our help desk to assist you in resolving this issue.';    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
					    $mail2->send();
					    //End of email script

		header("Location: ../index.php?updateFailed=false&reason=success");

  mysqli_close($connection);
?>
