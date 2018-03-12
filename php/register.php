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
			 	$password = $_POST['password'];
				$email = $_POST['email'];
				$name = $_POST['name'];
				$id = $_POST['tokenId'];
				$SQLstring = "SELECT ID FROM users WHERE ID = '$id'";
				$q = @mysqli_query($db, $SQLstring)
				Or die("<div><p>ERROR: Unable to execute query.</p>" . "<p>Error Code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p></div>");	
				
				if(mysqli_num_rows($q) != 0){
					
					$selectPass = "SELECT password, email, name, ID FROM users WHERE ID = '$id'";
					$result = mysqli_query($db, $selectPass);
					$row = mysqli_fetch_row($result);
					//variables in case we want future error handling
					$pass = $row[0];
					$mail = $row[1];
					$userName = $row[2];
					$idCheck = $row[3];
					
					if($idCheck == $id){	
					$query = "UPDATE users SET name = '$name', email = '$email',
					 password = '$password' WHERE ID = '$id'";
					$q = mysqli_query($db, $query)
					Or die("<div><p>ERROR: Unable to update. Please contact help desk.</p>" . "<p>Error Code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p></div>");
					header"Location: http://ec2-54-201-184-63.us-west-2.compute.amazonaws.com/dev/php/index.php");
					exit();
					}
					else{
						  header("Location: http://ec2-54-201-184-63.us-west-2.compute.amazonaws.com/dev/php/index.php");
						exit();
					}
					}
					else{ 
						echo "<p>Oops, something went wrong. Go back and try again!</p>";} 
					}
?>

 </body>
  <!--
    DENISE THUY VY NGUYEN
    2/1/2018
	SCOTTY CARDWELL
	3/2/2018
	--> 
</html>