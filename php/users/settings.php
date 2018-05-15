<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trash Tracker</title>
    <link rel="icon" href="../../images/trashtracker.png"/>
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="../../css/stylesheet.css" >
    <!--CSS MEDIA QUERY-->
    <link rel="stylesheet" href="../../css/stylesheet2.css">
    <!-- ICONS https://material.io/icons/#ic_cloud-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
<!--HEADER-->
<header style=""> <!--START OF HEADER-->
    <!--START OF NAV-->  
    <?php include "header.php"; ?>
  </header><!--END OF HEADER-->
  

<!--SETTING-->
<div class="container" style="background-color:#b4b4b4; margin-top: 20px; margin-bottom: 100px;  
                              padding: 20px; width: 80%;">
<div class="card border-dark mb-3" style="max-width: auto;">
  <div class="card-header"><h4 class="img_center">Update Trash Tracker Account</h4></div>
  <div class="card-body text-dark">
    <h5 class="card-title">Change some profile information?</h5>
    <p class="card-text">
    	  <!-- Testing Login Errors-->
	<form action = "updateSettings.php" method = "post">
	<div>
	  <span style = "color: #ff0000;">
      <?php $reasons = array("password" => "Your password has been updated </br>", "blank" => "No fields have information to update</br>",
							"email" => "Your email has been updated </br>", "name" => "Your name has been updated </br>", "update" => "Your information has been updated </br>"); 
                            if($_GET["updateFailed"] == true) echo $reasons[$_GET["reason"]]; ?>
	  </span>
	</div>
		<div class="form-group">
	<div>
	<span class="name"><b>Current Name:</b></span> <?php echo $_SESSION['name']; ?>
	<br></br>
	</div>	
	    <label for="inputName">
        <span class="name"><b>New Name</b></span>
      </label>
        <input type="name" class="form-control" name="newName" id= "newName" 
                            aria-describedby="newName" placeholder="New Name">
		</div>
    <div class="form-group">
	<div>
  <span class="name"><b>Current Email:</b></span>
    <?php echo $_SESSION['Email']; ?>
	<br></br>
	</div>
        <label for="inputEmail">
         <span class="name"><b>New Email</span><b>
        </label>
        <input type="email" class="form-control" name="newEmail" id= "newEmail" 
                    aria-describedby="newEmail" placeholder="New Email">
    </div>
    <div class="form-group">
	<br>
        <label for="inputUpdatePW">
          <span class="name"><b>New Password<span></b>
        </label>
        <input type="password" class="form-control" name="newPassword" id= "newPassword" 
                  aria-describedby="newPassword" placeholder="New Password">
    </div>
    <br><br>
       <p class="img_center">
        <a type = "submit" name = "submit" class="btn btn-sm btn-success" href="../account.php" value = "Return"/>Return</a> &nbsp;
        <input type = "submit" name = "submit" class="btn btn-sm btn-success" value = "Update"/> 
        <br/><br/>
      </p>
  </form><!-- form-group -->
    </p>
  </div>
	</div>
  </div><!--.container-->
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