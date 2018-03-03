<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trash Tracker</title>
    <link rel="icon" href="../images/trashtracker.png"/>
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="../css/stylesheet.css" >
    <!--CSS MEDIA QUERY-->
    <link rel="stylesheet" href="../css/stylesheet2.css">
      <!-- ICONS https://material.io/icons/#ic_cloud-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<?php
  
  		 $db = @mysqli_connect("reinvent-solutions-rds-instance-id.ck1gum76iw9m.us-west-2.rds.amazonaws.com","reinvent","solutions")
         Or die("<div><p>ERROR: Unable to connect to database server.</p>" . "<p>Error Code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p></div>");
		 
         @mysqli_select_db($db, "REINVENTSOLUTIONS")
         Or die("<div><p>ERROR: The database is not available. </p>" . "<p>Error Code" . mysqli_errno() . ": " . mysqli_error() . "</p></div>");

				if($_POST['submit'] !== '' && isset($_POST['submit'])){
					$password = $_POST['userPassword'];//input password
					$email = $_POST['userEmail1'];//input email
				
					$userLogin = "SELECT password, email, ID FROM users WHERE email = '$email'";
					$result = mysqli_query($db, $userLogin);
					$row = mysqli_fetch_row($result);
					$pass = $row[0]; //database password
					$mail = $row[1]; //dataase email
					$id = $row[2]; //database userID
				
				if(($password !== '' && $email !== '')&&($pass == $password && $mail == $email)&&($id !== $email)){
					    header("Location: http://localhost/Trash%20Tracker/account.html");//make chages here
						exit();
				}
				else if($id == $email ){
					    header("Location: http://localhost/Trash%20Tracker/signup.html");//make changes here
						exit();
				}
				}
				else{ 
					header("Location: http://localhost/Trash%20Tracker/index.html");//make changes here
					exit();
				} 
		 
		 mysqli_close($db);
  ?>
  </body>
  
  <!--
    DENISE THUY VY NGUYEN
    2/1/2018
	SCOTTY CARDWELL
	3/2/2018
	--> 
</html>