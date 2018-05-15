<!-- 
    #######################################################
    FILENAME: register.php
    OVERVIEW: PHP page for Trash Tracker's new users.
	PURPOSE: Will validate users input ID tokenIf ID token 
	is in the database will allow user to sign up, and 
	redirect to index.php. Also sends out an email to the 
	users email that they have just registered. If not will 
	display error and stay on signup.php. 
    #######################################################
-->
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
		header("Location: signup.php");//make changes here
			exit();
	}
	
				$password1 = $_POST['password'];
				$password = password_hash($password1, PASSWORD_DEFAULT);
				$email = $_POST['email'];
				$name = $_POST['name'];
				$id = $_POST['tokenId'];
				$spacing = "<br><br>";
				$updateFailed = false;
				$updateFailed = false;
				
				$selectPass = "SELECT password, email, name, ID FROM Users WHERE ID = '$id'";
				$result = @mysqli_query($connection, $selectPass);
				$row = mysqli_fetch_row($result);
				//variables in case we want future error handling
				$pass = $row[0];
				$mail = $row[1];
				$userName = $row[2];
				$idCheck = $row[3];
				
				if (($password1 == '')||($id == '')||($name == '')||($email == '')){
					$updateFailed = true;
					die(header("Location: signup.php?updateFailed=true&reason=blank"));
					}
				
				else if($idCheck == $id){	
					$query = "UPDATE Users SET name = '$name', email = '$email',
					 password = '$password' WHERE ID = '$id'";
					$q= mysqli_query($connection, $query);

                        //Send an email to the user's current email session for the password update
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
					    $mail->addAddress($email);     				            // Add a recipient
					    //$mail->addAddress('ellen@example.com');                   // Name is optional
					    //$mail->addReplyTo('info@example.com', 'Information');
					    //$mail->addCC('cc@example.com');
					    //$mail->addBCC('bcc@example.com');

					    //Attachments
					    //$mail->addAttachment('/var/tmp/file.tar.gz');             // Add attachments
					    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');        // Optional name

					    //Content
					    $mail->isHTML(true);                                        // Set email format to HTML
					    $mail->Subject = 'Welcome to Trash Tracker.';
					    $mail->Body    = 'Dear '.$name.','.$spacing.'Welcome to Trash Tracker! We would like to thank you for setting up your account with us. Please use the email and password that you have provided us to view your account status.';    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
					    $mail->send();
					    //End of email script
				
				$updateAccount = true;
				header("Location: ../index.php?updateAccount = true&reason=register");
				exit();
				}
				else{
					$updateFailed = true;
					die(header("Location:signup.php?updateFailed=true&reason=tokenIDinvalid"));
					}
 mysqli_close($connection);
?>