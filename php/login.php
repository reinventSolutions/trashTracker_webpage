<html>
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
  
$DBservername = "reinvent-solutions-rds-instance-id.ck1gum76iw9m.us-west-2.rds.amazonaws.com";
$DBusername = "reinvent";
$DBpassword = "solutions";
$DBname = "REINVENTSOLUTIONS";

 /* Connect to MySQL and select the database. */
  $connection = mysqli_connect($DBservername, $DBusername, $DBpassword);

	if (mysqli_connect_errno()) 
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
    else 
      echo "<p>Connected into database</p>";
  
	   if($_POST['submit'] !== '' && isset($_POST['submit'])){
          $password = $_POST['userPassword'];//input password
          $email = $_POST['userEmail'];//input email
        
          $userLogin = "SELECT password, email, ID FROM users WHERE email = '$email'";
          $result = mysqli_query($db, $userLogin);
          $row = mysqli_fetch_row($result);
          $pass = $row[0]; //database password
          $mail = $row[1]; //dataase email
          $id = $row[2]; //database userID
        
        if(($password !== '' && $email !== '')&&($pass == $password && $mail == $email)&&($id !== $password)){
              header("Location: http://ec2-54-201-184-63.us-west-2.compute.amazonaws.com/dev/php/account.php");//make chages here
            exit();
        }
        else if($id == $password ){
              header("Location: http://ec2-54-201-184-63.us-west-2.compute.amazonaws.com/dev/php/signup.php");//make changes here
            exit();
        }
        }
        else{ 
			  header("Location: http://ec2-54-201-184-63.us-west-2.compute.amazonaws.com/dev/php/index.php");//make changes here
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