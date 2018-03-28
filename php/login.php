<?php include "../../DB/dbinfo.php"; ?>
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
  session_start();
  $connection = mysqli_connect($DBservername, $DBusername, $DBpassword);
  @mysqli_select_db($connection, $DBname);

     if($connection){
          $password = $_POST['userPassword'];//input password
          $email = $_POST['userEmail'];//input email
        
          $userLogin = "SELECT password, email, ID, name FROM Users WHERE email = '$email'";
          $result = @mysqli_query($connection, $userLogin);
          $row = mysqli_fetch_row($result);
          $pass = $row[0]; //database password
          $mail = $row[1]; //database email
          $id = $row[2]; //database userID
          $name = $row[3]; //database name

          $_SESSION["name"] = $name;

          $getAddress = "SELECT UsernameID, Address, St, City, Zip, House FROM Houses WHERE UsernameID ='$id'";

          $addressResult = @mysqli_query($connection, $getAddress);
          $row2 = mysqli_fetch_row($addressResult);
          $userid = $row2[0];
          $address = $row2[1];
          $state = $row2[2];
          $city = $row2[3];
          $zip = $row2[4];
		  $house = $row2[5];

          $_SESSION["Address"] = $address; 
          $_SESSION["St"] = $state;
          $_SESSION["City"] = $city;
          $_SESSION["Zip"] = $zip;
      $_SESSION["House"] = $house;

    //IF ID TOKEN GIVEN IS == PASSWORD IN DB 
    if($id == $password ){
              header("Location: signup.php");//make changes here
            exit();
    }
        else if(($pass == $password && $mail == $email)&&($id !== $pass)){
              $_SESSION[logged_in] = true;
              header("Location: account.php");//make chages here
            exit();
        }
    else{ 
      echo "<p>INVALID</p>";
      header("Location: index.php");//make changes here
      exit();
        } 
        }
      else{ 
        echo "<p>INVALID</p>";
        header("Location: index.php");//make changes here
      exit();
        } 
     
     mysqli_close($connection);
  ?>
  
  </body>

  <!--
    DENISE THUY VY NGUYEN
    2/1/2018
  SCOTTY CARDWELL
  3/2/2018
  --> 
</html>