<?php include "../../DB/dbinfo.php"; ?>
<?php
	$connection = mysqli_connect($DBservername, $DBusername, $DBpassword);
	@mysqli_select_db($connection, $DBname);
	
	if(!$connection){
		header("Location: http://ec2-54-201-184-63.us-west-2.compute.amazonaws.com/TrashTracker/php/signup.php");//make changes here
			exit();
	}
				$password = $_POST['password'];
				$id = $_POST['tokenId'];	
				$updateFailed = false;
				
				$selectPass = "SELECT ID FROM Users WHERE ID = '$id'";
				$result = @mysqli_query($connection, $selectPass);
				$row = mysqli_fetch_row($result);
				$idCheck = $row[0];
					
				if (($password == '')||($id == '')){
					$updateFailed = true;
					die(header("Location:forgotPassword.php?updateFailed=true&reason=blank"));
					}
					
				else if($idCheck == $id){	
					$query = "UPDATE Users SET password = '$password' WHERE ID = '$id'";
					$q= mysqli_query($connection, $query);	
				
					header("Location: http://ec2-54-201-184-63.us-west-2.compute.amazonaws.com/TrashTracker/php/index.php");
					exit();
					}
				else{
					$updateFailed = true;
					die(header("Location:forgotPassword.php?updateFailed=true&reason=tokenIDinvalid"));
					}

 mysqli_close($connection);
?>