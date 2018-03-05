<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trash Tracker</title>
    <link rel="icon" href="../images/trashTracker.png"/>
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--CSS-->
    <link rel="stylesheet" href="css/stylesheet.css" >
    <!--CSS MEDIA QUERY-->
    <link rel="stylesheet" href="css/stylesheet2.css">
      <!-- ICONS https://material.io/icons/#ic_cloud-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
<!--LOGIN-->
<div class="container" id="id" style="background-color:#b4b4b4;"><!--container-fuild-->
  <div class="row" style="padding: 0 15px"><!--ROW-->
    <div class="col-sm" style="background-color:#FFFFFF; margin: 5px; text-align:center; padding: 15px;"><!--LOGO-->
      <h1>
        <img src="../images/trashtracker.png" width="100px">
        Welcome to Trash Tracker     
      </h1>
    </div><!--LOGO-->    
 </div><!--ROW-->
</div><!--container-fuild-->

<!--PHP-->
<div class="container" style="background-color:#b4b4b4; margin-top: 25px; margin-bottom: 25px; height: auto;">
 <div class="row">
   <div class="col-sm" style="background-color:#FFFFFF; margin: 5px; padding: 15px 10px; height:auto;">
  <?php
  // Start the session
  session_start();
?> 

<?php
$servername = "reinvent-solutions-rds-instance-id.ck1gum76iw9m.us-west-2.rds.amazonaws.com";
$username = "reinvent";
$password = "solutions";
$dbname = "REINVENTSOLUTIONS";

 /* Connect to MySQL and select the database. */
  $connection = mysqli_connect($servername, $username, $password);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
    else 
      echo "<p>Connected into database</p>";

    $database = mysqli_select_db($connection, $dbname);  
    if (mysqli_connect_errno()) echo "Failed to connect to selected db" . mysqli_connect_error();
      else 
          echo "<p>Connected to the database now select table</p>";
  ?>


 </div>
 </div>
</div>


<!--SIGN IN-->
<div class="container" style="background-color:#b4b4b4; margin-top: 25px; margin-bottom: 25px">
  <div class="row">      
   <div class="col-sm" style="background-color:#FFFFFF; margin: 5px; padding: 15px 10px; height:auto;">
    <h3>Log into Trash Tracker</h3><br>
    
    <form action="/login.php" metho="post">
      <div class="form-group">
        <label for="InputEmail1">Email address</label>
        <input type="email" class="form-control" id="userEmail" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="InputPassword">Password</label>
        <input type="password" class="form-control" id="userPassword" placeholder="Password">
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="remeberUser">
        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
        <p class="alignright">
            <a href="">Forgot Password?</a>
          </p><br>
      </div><br>
      <a class="btn btn-sm btn-success" role="button" oncick="login()">Log In</a> <br>
    </form>

    <hr id="bottom_line">
    Or log in as<br> 
    <a class="btn btn-sm btn-primary" href="../trashTracker_webpage/signup.html" role="button" onclick=""> New User</a> <br>  

  </div>
  <div class="col-sm-6" style="background-color:#b4b4b4; margin: 5px; padding: 10px;">
    <p class="img_center"><img src="../images/house.png" class="resize1" width= 300px;></p>
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

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script type="text/javascript" src="js/login.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
</html>


<!--
PHP STUFF
          if($_POST['submit'] !== '' && isset($_POST['submit'])){
          $password = $_POST['userPassword'];//input password
          $email = $_POST['userEmail'];//input email
        
          $userLogin = "SELECT password, email, ID FROM users WHERE email = '$email'";
          $result = mysqli_query($connection, $userLogin);
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
     
     mysqli_close($connection);

-->

<!--
    DENISE THUY VY NGUYEN
    2/1/2018
-->