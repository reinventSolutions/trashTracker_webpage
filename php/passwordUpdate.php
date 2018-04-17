<!-- 3. THIS IS WHERE WE UPDATE THE PASSWORD AFTER CHECKS, THEN
        HEADER TO index.php-->

<?php include "../../DB/dbinfo.php"; ?>
<?php
	$connection = mysqli_connect($DBservername, $DBusername, $DBpassword);
	@mysqli_select_db($connection, $DBname);

	if(!$connection){
		header("Location: http://ec2-54-201-184-63.us-west-2.compute.amazonaws.com/TrashTracker/php/signup.php");//make changes here
			exit();
	}

  $email = $_POST['recoveryEmail'];
  $selectPass = "SELECT password FROM Users WHERE email = '$email'";
  $result = mysqli_query($connection, $selectPass);
  $row = mysqli_fetch_row($result);
  $pass = $row[0];

  $recoveryPassword = $_POST['recoveryPassword'];
  $newPassword = $_POST['newPassword'];
  $confirmPassword = $_POST['confirmPassword'];

  if (($recoveryPassword != '$pass'){
  					$updateFailed = true;
  					die(header("Location:forgotPassword.php?updateFailed=true&reason=blank"));
  					}

  else if ($newpassword != $confirmPassword){
					$updateFailed = true;
					die(header("Location:forgotPasswordUpdate.php?updateFailed=true&reason=blank"));
          exit();
					}

  else {
    $updatePass = "UPDATE Users SET password ='$newPassword' WHERE email = '$email'";
  }

  mysqli_close($connection);
  header("Location: http://ec2-54-201-184-63.us-west-2.compute.amazonaws.com/TrashTracker/php/index.php");
 ?>
