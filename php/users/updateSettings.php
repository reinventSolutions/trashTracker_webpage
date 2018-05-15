<!-- 
    #######################################################
	FILENAME: updateSettings.php
	OVERVIEW: PHP to update user profile settings.
	PURPOSE: Updates user information in the database. Sends
	an email to the user.
    #######################################################
-->
<?php include "../../../DB/dbinfo.php"; ?>
<?php
	session_start();
?>
<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require_once 'PHPMailer/src/Exception.php';
	require_once 'PHPMailer/src/PHPMailer.php';
	require_once 'PHPMailer/src/SMTP.php';


	$connection = mysqli_connect($DBservername, $DBusername, $DBpassword);
	@mysqli_select_db($connection, $DBname);

	 $current = $_SESSION['Email'];
	 $name = $_SESSION['name'];
	
	if(!$connection){
		header("Location: settings.php");//make changes here
		exit();
	}
	
		$newPassword1 = $_POST['newPassword'];
		$newPassword = password_hash($newPassword1, PASSWORD_DEFAULT);
		$newName = $_POST['newName'];
		$newEmail = $_POST['newEmail'];
		$updateFailed = false;
		$oldEmail = $_SESSION["Email"];
		
		$selectInfo = "SELECT password, email, name FROM Users WHERE email = '$current'";
		$result = @mysqli_query($connection, $selectInfo);
		$row = mysqli_fetch_row($result);
		//variables in case we want future error handling
		$pass = $row[0];
		$mail = $row[1];
		$userName = $row[2];
		
		//if a field has input
		if($newPassword1 != '' || $newEmail != '' || $newName != ''){		
			if($newPassword1 != '' && $newPassword != $pass){
				
				$query = "UPDATE Users SET password = '$newPassword' WHERE email = '$current'";
				$q = mysqli_query($connection, $query);	
				if($newEmail == '' && $newName == ''){
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
					    $mail2->addAddress($oldEmail);     				            // Add a recipient
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
				$updateFailed = true;
				die(header("Location:settings.php?updateFailed=true&reason=password"));
				}
			}
			if($newEmail != '' && $newEmail != $mail){
				$query2 = "UPDATE Users SET email = '$newEmail' WHERE email = '$current'";
				$q2 = mysqli_query($connection, $query2);
				$_SESSION["Email"] = $newEmail;
						//Email to the previous email account that their account status has been changed
						$mail = new PHPMailer(true);                          // Passing `true` enables exceptions
					    //Server settings
					    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
					    $mail->isSMTP();                                      // Set mailer to use SMTP
					    $mail->Host = "smtp.gmail.com"; 					  // Specify main and backup SMTP servers
					    $mail->SMTPAuth = true;                               // Enable SMTP authentication
					    $mail->Username = "reinv3nt.solutions@gmail.com";     // SMTP username
					    $mail->Password = "helloworld18";                     // SMTP password
					    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
					    $mail->Port = 465;

					    //Recipients
					    $mail->setFrom('reinv3nt.solutions@gmail.com');
					    $mail->addAddress($oldEmail);     				            // Add a recipient
					    //$mail->addAddress('ellen@example.com');                   // Name is optional
					    //$mail->addReplyTo('info@example.com', 'Information');
					    //$mail->addCC('cc@example.com');
					    //$mail->addBCC('bcc@example.com');

					    //Attachments
					    //$mail->addAttachment('/var/tmp/file.tar.gz');             // Add attachments
					    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');        // Optional name

					    //Content
					    $mail->isHTML(true);                                        // Set email format to HTML
					    $mail->Subject = 'Your Trash Tracker account settings have been changed.';
					    $mail->Body    = 'Your Trash Tracker email address and/or password have been changed. If this was not you please contact our help desk to assist you in resolving this issue.';    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
					    $mail->send();
					    //End of email script
				if($newName == '' && $newPassword == ''){
				$updateFailed = true;
				die(header("Location:settings.php?updateFailed=true&reason=email"));
				}
			}
			if($newName != '' && $newName != $userName){
				$query3 = "UPDATE Users SET name = '$newName' WHERE email = '$current'";
				$q3= mysqli_query($connection, $query3);	
				$_SESSION['name'] = $newName;
				if($newEmail == '' && $newPassword == ''){
					$updateFailed = true;
					die(header("Location:settings.php?updateFailed=true&reason=name"));
				}
			}
			die(header("Location:settings.php?updateFailed=true&reason=update"));
		}
		//else no field has input
		else{
			$updateFailed = true;
			die(header("Location:settings.php?updateFailed=true&reason=blank"));
		}

	mysqli_close($connection);
?>