<?
if( $_SESSION['last_activity'] < time()-$_SESSION['expire_time'] ) { //have we expired?
    //redirect to logout.php
    header('Location: logout.php'); //change yoursite.com to the name of you site!!
} else{ //if we haven't expired:
    $_SESSION['last_activity'] = time(); //this was the moment of last activity.
}
$_SESSION['last_activity'] = time(); //your last activity was now, having logged in.
$_SESSION['expire_time'] = 1*10*1; //expire time in seconds: three hours (you must change this
php include "../../DB/dbinfo.php";
session_start();
  if($_SESSION['logged_in'] != true)
    header("Location: index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">  
  <meta http-equiv="refresh" content="3;url=account.php" />



    <title>Trash Tracker</title>
    <link rel="icon" href="../images/trashtracker.png"/>
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!--CSS-->
    <link rel="stylesheet" href="../css/stylesheet.css">
    <!--CSS MEDIA QUERY-->
    <link rel="stylesheet" href="../css/stylesheet2.css">
</head>
<!--BEGIN MAIN CONTENT-->
<body><!--START OF BODY--> 
<div classs="container"> 
 <div class="splasher">
  <img src="../images/logo/tt_crop.gif"><br>
  <div class="splashButton">
      <!--<a href="account.php" class="btn-lg btn-block btn-secondary" value="Enter"/>Enter</a>-->
  </div>
 </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
          integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
          integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
</html>