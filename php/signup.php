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
<!--LOGIN-->
<div class="container-fuild" id="id" style="background-color:#b4b4b4;"><!--container-fuild-->
  <div class="row" style="padding: 0 15px"><!--ROW-->
    <div class="col-sm" style="background-color:#FFFFFF; margin: 5px; text-align:center; padding: 15px;"><!--LOGO-->
      <h1>
        <img src="../images/trashtracker.png" width="100px">
        Welcome to Trash Tracker     
      </h1>
    </div><!--LOGO-->    
 </div><!--ROW-->
</div><!--container-fuild-->
<!--.GENERAL INFO-->

<!--SIGN IN-->
<div class="container" style="background-color:#b4b4b4; margin-top: 15px; width: 500px; margin-bottom: 80px">
  <div class="row">      
   <div class="col-sm" style="background-color:#FFFFFF; margin: 5px; padding: 15px 10px; height:auto;">
    <h4>Registering to Trash Tracker</h4><br>
	<div class = "container">
    <!--<form name="userLogin">-->
	<form action = "register.php" method = "post">
      <div class="form-group">
        <label for="InputID">ID TOKEN</label>
        <input type="text" class="form-control" name="tokenId" id="tokenId" aria-describedby="token" placeholder="Enter ID">
      </div>
        <label for="inputName">Name</label>
        <input type="name" class="form-control" name="name" id= "name" aria-describedby="name" placeholder="Enter Name">
      <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="email" class="form-control" name="email" id= "email" aria-describedby="email" placeholder="Enter Email">
    </div>
    <div class="form-group">
        <label for="inputUpdatePW">New Password</label>
        <input type="password" class="form-control" name="password" id= "password" aria-describedby="updatepassword" placeholder="New Password">
    </div>
	<input type = "submit" name = "submit" class="btn btn-sm btn-success" value = "Update and Return"/> <br>
    </form>
	</div>
  </div>
  </div>
 </div><!--.row-->
</div><!--.container-->


<footer><!--FOOTER CONTAINER-->
<nav class="navbar fixed-bottom navbar-expand navbar-light bg-light"><!--START BOTTOM NAVBAR-->

          <a class="nav-link" href="contact">Contact Us</a> 
          |
          <a class="nav-link" href="">Privacy and Policy</a>
      </div>
  </nav><!--END BOTTOM NAVBAR-->
</footer><!--.FOOTER-->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script type="text/javascript" src="js/login.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
</html>

<!--
    DENISE THUY VY NGUYEN
    2/1/2018
-->