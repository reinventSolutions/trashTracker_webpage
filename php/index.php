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

session_start();
  
  		 $db = @mysqli_connect("reinvent-solutions-rds-instance-id.ck1gum76iw9m.us-west-2.rds.amazonaws.com", "reinvent", "solutions") // I think this should work
         Or die("<div><p>ERROR: Unable to connect to database server.</p>" . "<p>Error Code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p></div>");
		 
         @mysqli_select_db($db, "REINVENTSOLUTIONS") // This should work as well
         Or die("<div><p>ERROR: The database is not available. </p>" . "<p>Error Code" . mysqli_errno() . ": " . mysqli_error() . "</p></div>");
		 
		 if($_POST['submit'] !== '' && isset($_POST['submit'])){

					$password = $_POST['userPassword'];//input password
					$email = $_POST['userEmail1'];//input email
					$name = $_POST['userName'];// User's name in db
					$ID = $POST['userID']; // ID in db

					$address = $_POST['streetAddress'] // User's address
					$city = $_POST['city'] // User's city
					$zip = $_POST ['zip'] // User's Zip code


					$userLogin = "SELECT password, email, ID FROM users WHERE email = '$email'";
					$result = mysqli_query($db, $userLogin);
					$row = mysqli_fetch_row($result);
					$pass = $row[0]; //database password
					$mail = $row[1]; //dataase email
					$id = $row[2]; //database userID

					$findAddress = "SELECT address, city, zip FROM Houses where usernameID = '$ID'";

					$result2 = mysqli_query($db, $findAddress);
					$row2 = mysqli_fetch_row($result2)
					$address = $row2[0];
					$city = $row2[1];
					$zip = $row2[2];

				
				if(($password !== '' && $email !== '')&&($pass == $password && $mail == $email)&&($id !== $email)){

					$_SESSION["userName"] = $name;
					$_SESSION["logged_in"] = true;
					$_SESSION["userAddress"] = $address;
					$_SESSION["userCity"] = $city;
					$_SESSION["userZip"] = $zip;

					echo "Logged in!";

					    header("Location: http://ec2-54-201-184-63.us-west-2.compute.amazonaws.com/dev2/html/index.html");//make chages here
						exit();
				}
				else if($id == $email ){
					    header("Location: http://ec2-54-201-184-63.us-west-2.compute.amazonaws.com/dev2/html/signup.html");//make changes here
						exit();
				}
			
		 }
		 else{ 
			    header("Location: http://ec2-54-201-184-63.us-west-2.compute.amazonaws.com/dev2/html/login.html");//make changes here
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
	KEVIN TRUEBE
	3/2/2018
	--> 