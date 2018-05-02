<html>
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
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
<!--LOGIN-->
<div class="container-fluid" id="id" style="background-color:#b4b4b4;"><!--container-fuild-->
  <div class="row" style="padding: 0 15px"><!--ROW-->
    <div class="col" style="background-color:#FFFFFF; margin: 5px; text-align:center; padding: 15px;"><!--LOGO-->
      <h1>
        <img src="../images/trashtracker.png" width="100px">
        Welcome to Trash Tracker     
      </h1>
    </div><!--LOGO-->    
 </div><!--ROW-->
</div><!--container-fuild-->


<!--SIGN IN-->
<div class="container" style="background-color:#b4b4b4; margin-top: 25px; margin-bottom: 15%">
  <div class="row">      
   <div class="col-sm" style="background-color:#FFFFFF; margin: 5px; padding: 25px 10px; height:auto;">
    <h3 class="img_center">Log into Trash Tracker</h3><br>
    <div>
    <form action="users/login.php" method="post">
      <div class="form-group">
      <!-- Testing Login Errors-->
      <div>
      <span style = "color: #ff0000;">
        <?php $reasons = array("password" => "Wrong Username or Password</br>", "blank" => "You have left one or more fields blank</br>", 
		                       "success" => "Successfully updated your new password</br>",
							   "register" => "Account successfully created</br>"); 
                          if($_GET["loginFailed"] == true || $_GET["updatefailed"] == false) echo $reasons[$_GET["reason"]]; ?>
      </span>
      </div>
	    <!-- End Test -->
        <label for="InputEmail1"><strong class="name">Email Address</strong></label>
        <input type="text" class="form-control" name= "userEmail" id="userEmail" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="InputPassword"><strong class="name">Password</strong></label>
        <input type="password" class="form-control" name= "userPassword" id="userPassword" placeholder="Password">
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="remeberUser">
        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
		<p class="alignright">
            <a href="users/forgotPassword.php">Forgot Password?</a>
    </p>       		
    <p class = ""><a type = "checkbox" id = "needhelp"><font color = "#0066ff">Need Help?</font></a></p>
		 <div id = "help">
        For first time users, please enter the email and password the information provided by Trash Tracker pamplet to begin resgistration into the website.
        <br/><br/>
        For registered users, If you have forgotten your password please select "Forgot Password?" and we will help by sending you a temporary password to email address provided upon registration.
        <br/><br/>
        If you are continue to experience difficulties logging into the website or registering please contact us at <b>(760)750-3022</b>.
        <br/><br/>
		    <p class = ""><a type = "checkbox" color = "red" id = "hidehelp"><font color = "#0066ff">Hide</font></a></p>
		 </div>
    </div>
      <p class="img_center">
        <input type="submit" class="btn btn-sm btn-success" value="Log In"/>
      </p>
       <hr>
      <h3 style="color: #0066ff; text-align:center;"> New User </h3>
      <p class="img_center">
        <a href = "users/signup.php">
          <input type="button" class="btn btn-sm btn-success" onclick = "users/signup.php" value="Sign Up"/><br>
        </a>
       </p>
	</form>
	</div>

  </div>
  <div class="col-sm-6" style="background-color:#b4b4b4; margin: 5px; padding: 10px;">
    <p class="img_center"><img src="../images/house.png" class="resize1" width= "100%"; style="padding-top:auto; padding-bottom: auto;"></p>
  </div><!--.col-sm-->
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

<!-- jQuery first, then Popper.js, then Bootstrap JS 
  <script type="text/javascript" src="js/login.js"></script>-->
  <script>
  $("#help").hide();
  $(document).ready(function(){
	$('#needhelp').click(function(){
	$("#help").show();
	});	
	$('#hidehelp').click(function(){
	$("#help").hide();
	});	
	})
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
</html>

<!--
    DENISE THUY VY NGUYEN
    2/1/2018
-->