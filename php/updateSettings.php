<?php include "../../DB/dbinfo.php"; ?>
<?php
session_start();
?>
<?php
	$connection = mysqli_connect($DBservername, $DBusername, $DBpassword);
	@mysqli_select_db($connection, $DBname);
	
	if(!$connection){
		header("Location: signup.php");//make changes here
			exit();
	}
	
				$password = $_POST['password'];
				$email = $_POST['email'];
				$name = $_POST['name'];
				$newPassword = $_POST['newPassword'];
				$newName = $_POST['newName'];
				$newEmail = $_POST['newEmail'];
				$updateFailed = false;
				
				$selectPass = "SELECT password, email, name FROM Users WHERE name = '$name' AND email = '$email' AND password = '$password'";
				$result = @mysqli_query($connection, $selectPass);
				$row = mysqli_fetch_row($result);
				//variables in case we want future error handling
				$pass = $row[0];
				$mail = $row[1];
				$userName = $row[2];
				
				if (($password == '')||($name == '')||($email == '')||($newPassword == '')||($newName == '')||($newEmail == '')){
					$updateFailed = true;
					die(header("Location:settings.php?updateFailed=true&reason=blank"));
					}
				
				else if(($pass == $password)&&($mail = $email)&&($name = $userName)){	
					$query = "UPDATE Users SET name = '$newName', email = '$newEmail',
					 password = '$newPassword' WHERE name = '$name' AND email = '$email' AND password = '$password'";
					$q= mysqli_query($connection, $query);	
					$_SESSION["name"] = $newName;
//					echo <script type="text/javascript">alert('Success');</script>;
					header("Location: account.php");
				exit();
				}
				else{
					$updateFailed = true;
					die(header("Location:settings.php?updateFailed=true&reason=tokenIDinvalid"));
					}
 mysqli_close($connection);
?>