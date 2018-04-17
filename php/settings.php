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
<!--HEADER-->
<div class="container-fluid" id="id" style="background-color:#b4b4b4;"><!--container-fuild-->
  <div class="row" style="padding: 0 15px"><!--ROW-->
    <div class="col" style="background-color:#FFFFFF; margin: 5px; text-align:center; padding: 15px;"><!--LOGO-->
      <h1>
        <a href="account.php">
            <img src="../images/trashtracker.png" width="100px">
        </a>
        Welcome to Trash Tracker     
      </h1>
    </div><!--LOGO-->    
 </div><!--ROW-->
</div><!--container-fuild-->

<!--SETTING-->
<div class="container" style="background-color:#b4b4b4; margin-top: 15px; margin-bottom: 80px; width: 80%;">
  <div class="row">      
   <div class="col-sm" style="background-color:#FFFFFF; margin: 5px; padding: 15px 10px; height:auto;">
    <h4>Update Trash Tracker Account</h4><br>
	<div class = "container">
	  <!-- Testing Login Errors-->
	<form action = "updateSettings.php" method = "post">
	<div>
	  <span style = "color: #ff0000;">
      <?php $reasons = array("tokenIDinvalid" => "The information provided is invalid </br>", "blank" => "You have left one or more fields blank</br>"); 
                            if($_GET["updateFailed"] == true) echo $reasons[$_GET["reason"]]; ?>
	  </span>
	</div>
	<div class = "form-group">
        <label for="inputName"> Current Name</label>
        <input type="name" class="form-control" name="name" id= "name" aria-describedby="name" placeholder="Current Name">
		</div>
    <div class="form-group">
        <label for="inputEmail">Current Email</label>
        <input type="email" class="form-control" name="email" id= "email" aria-describedby="email" placeholder="Current Email">
    </div>
	    <div class="form-group">
        <label for="inputUpdatePW">Current Password</label>
        <input type="password" class="form-control" name="password" id= "password" aria-describedby="password" placeholder="Current Password">
    </div>
		<div class="form-group">
	    <label for="inputName">New Name</label>
        <input type="name" class="form-control" name="newName" id= "newName" aria-describedby="newName" placeholder="New Name">
		</div>
    <div class="form-group">
        <label for="inputEmail">New Email</label>
        <input type="email" class="form-control" name="newEmail" id= "newEmail" aria-describedby="newEmail" placeholder="New Email">
    </div>
    <div class="form-group">
        <label for="inputUpdatePW">New Password</label>
        <input type="password" class="form-control" name="newPassword" id= "newPassword" aria-describedby="newPassword" placeholder="New Password">
    </div>
      <br/>
       <p class="img_center">
        <input type = "submit" name = "submit" class="btn btn-sm btn-success" value = "Update and Return"/> 
        <br/><br/>
      </p>
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