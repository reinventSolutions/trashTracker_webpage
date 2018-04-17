<!-- 3. THIS IS WHERE WE UPDATE THE PASSWORD AFTER CHECKS, THEN
        HEADER TO index.php-->

<?php include "../../../DB/dbinfo.php"; ?>
<?php
	$connection = mysqli_connect($DBservername, $DBusername, $DBpassword);
	@mysqli_select_db($connection, $DBname);

	if(!$connection){
		header("Location: ../signup.php");
			exit();
	}

  $email = $_POST['recoveryEmail'];
	$recoveryPassword = $_POST['recoveryPassword'];
	$newPassword = $_POST['newPassword'];
	$confirmPassword = $_POST['confirmPassword'];
	$updateFailed = false;

  $selectPass = "SELECT password FROM Users WHERE email = '$email'";
  $result = @mysqli_query($connection, $selectPass);
  $row = mysqli_fetch_row($result);
	$pass = $row[0];
	
	if ($email == ''){
		$updateFailed = true;
		die(header("Location: updatepassword.php?updateFailed=true&reason=blank"));
	 }
	 else if ($recoveryPassword == ''){
		$updateFailed = true;
		die(header("Location: updatepassword.php?updateFailed=true&reason=blank"));
	 }
	 else if ($confirmPassword == ''){
		$updateFailed = true;
		die(header("Location: updatepassword.php?updateFailed=true&reason=blank"));
	 }
	 else if ($newPassword == ''){
		$updateFailed = true;
		die(header("Location: updatepassword.php?updateFailed=true&reason=blank"));
	 }  
		 else if ($recoveryPassword != $pass){
				$updateFailed = true;
        die(header("Location: updatepassword.php?updateFailed=true&reason=update"));
            //die(header("Location:forgotPassword.php?updateFailed=true&reason=blank"));
						}
					else if ($newPassword != $confirmPassword){
						$updateFailed = true;
						die(header("Location: updatepassword.php?updateFailed=true&reason=match"));
          	//die(header("Location:forgotPasswordUpdate.php?updateFailed=true&reason=blank"));
						exit();
					}
  else {
		$updatePass = "UPDATE Users SET password ='$newPassword' WHERE email = '$email'";
		$query = mysqli_query($connection, $updatePass);
		header("Location: ../index.php?updateFailed=false&reason=success");
	}
  mysqli_close($connection);
?>
