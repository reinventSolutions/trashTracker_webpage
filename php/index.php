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
  
  		 $db = @mysqli_connect(localhost, "root", "root") //Changes needed here
         Or die("<div><p>ERROR: Unable to connect to database server.</p>" . "<p>Error Code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p></div>");
		 
         @mysqli_select_db($db, "trashtracker") //Changes needed here
         Or die("<div><p>ERROR: The database is not available. </p>" . "<p>Error Code" . mysqli_errno() . ": " . mysqli_error() . "</p></div>");
		 
		 if($_POST['submit'] !== '' && isset($_POST['submit'])){
					$password = $_POST['userPassword'];//input password
					$email = $_POST['userEmail1'];//input email
				
					$userLogin = "SELECT password, email, ID FROM users WHERE email = '$email'";
					$result = mysqli_query($db, $userLogin);
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
		 
		 mysqli_close($db);
  ?>

 <header style="margin-bottom:80px;"> <!--START OF HEADER-->
  <!--START OF NAV-->  
  <nav class="navbar navbar-expand-sm navbar-light fixed-top" style="background-color:#fff;">
      <a class="navbar-brand" href="#"></a>
      <img class="img" src="../images/trashtracker.png" width="40px">
    </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">

          <?php
          session_start();
          if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){?>

            <a class="nav-link" href="#">Hello <?php echo $_SESSION["name"] ?><span class="sr-only">(current)</span></a>
          </li>
        </ul>

        <!-- NEED SPACE FOR ADDRESS HERE-->
        <span class="navbar-text">
            <a href="logout.php"> 
                <button type="button" class="btn btn-outline-secondary">Logout</button>
              </a>        
            </span>
      </div>
  </nav><!--END OF NAV-->
</header><!--END OF HEADER-->

<div class="container" style="background-color:#818285; margin-bottom: 80px;">
  <div class="row">

    <!--LEFT--> 
    <div class="container" id="info" style="background-color:#f7f7f7;  width:25%; height:auto;">
      <div class="row"><!--.row-->
        
        
        <div class="col" style="background-color:#fff;"><!--LOGO-->
            <p>Welcome [name] <br/>
                Street <br/>
                <p class="img_center">

              </p>
            </p>              
        </div><!--LOGO-->
    </div><!--.row-->
      
    
    <div class="row">
    <div class="col" style="background-color:#fff;"><!--BIN INFO-->
      <h6>Your bins</h6>
                <a href="#" title="Trash" data-toggle="popover" data-trigger="hover" data-content="BIN NUMBER">
                <button type="button" class="">
                    <img src="../images/waste.png" width="32px">
                </button>
            </a>
            <a href="#" title="Recycling" data-toggle="popover" data-trigger="hover" data-content="BIN NUMBER">
                <button type="button" class="">
                    <img src="../images/recycle.png" width="30px">
                </button>
            </a>
            <a href="#" title="Greenwaste" data-toggle="popover" data-trigger="hover" data-content="BIN NUMBER">
                <button type="button" class="">

                  <img src="../images/greenwaste.png" width="30px">
                </button>
            </a>
        <h6 class="img_center">Click for more information</h6>
      </div><!--.col-->
     </div><!--.row-->

    <div class="row">
    <div class="col" style="background-color:#fff;">
        <img src="../images/recycle.png" width="100px">
      </div>
  </div>

  </div><!--LEFT--> 

  <!--RIGHT--> 
  <div class="container" id="info" style="background-color:#f7f7f7;  width:800px; height:auto;">
    <div class="row">
      <!--Historical Comparison-->
        <div class="col" style="background-color:#FFFFFF; margin: 5px; height:auto;">
            <ul class="nav nav-tabs">
             <li class="nav-item">
              <a class="nav-link active" href="#">Weekly View</a>
             </li>
             <li class="nav-item">
              <a class="nav-link disabled" href="#">Monthly</a>
             </li>
             <li class="nav-item">
              <a class="nav-link disabled" href="#">Year View</a>
             </li>
            </ul>
            <p>
           <!--GRAPH DIV-->
           <a href=""><i class="material-icons">arrow_back</i>Past Week</a>
           <span class="alignright">
             <a href="">Next Week<i class="material-icons">arrow_forward</i></a>
           </span>
           <div id="chart_div" style="padding: 10px; width: 400px;"></div>
                <!-- OTHER GRAPHN BUTTONS....
            <div id="btn-group">
              <button class="button button-blue" id="none">No Format</button>
              <button class="button button-blue" id="scientific">Scientific Notation</button>
              <button class="button button-blue" id="decimal">Decimal</button>
              <button class="button button-blue" id="short">Short</button>
            </div>
             <p class="img_center">
            <a class="btn btn-sm btn-primary" href="" role="button">Recycling</a> &nbsp
            <a class="btn btn-sm btn-secondary" href="" role="button">Trash</a> &nbsp
            <a class="btn btn-sm btn-success" href="" role="button">Green Waste</a> &nbsp 
           </p>
     -->  
         </div><!--.col-sm-->
         </div><!--.row-->
        
         <div class="row">
          <!--Normal Comparison-->
          <div class="col" style="background-color:#FFFFFF; margin: 5px;">
          <h3>How do you stack up?</h3>
          <p class="img_center"><img src="../images/thumbsUp.png" class="resize1" width= 80px;></p>
          </div>
          <div class="col-sm-8" style="background-color:#FFFFFF; margin: 5px;">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Closest</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Neighborhood</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">City</a>
            </li>
          </ul>
          <p>
            We calculated the percent of waste you recycled this month, and found that you recycled more and sent less landfill than your neightbors did. 
          </p>
          </div><!--.col-sm 8-->
          </div><!--.row-->
             
   <!--RECYCLE GAME-->
   <div class="row">
        <div class="container">  
        <span class="img_center">
              <h3>Drag and drop each item into the correct bin for points!</h3>
          </span>
        </div>
       <div class="col-sm-6" style="background-color:#FFFFFF; margin: 5px; height:auto;">
        <p class="img_center" style="padding-top:25px;">
          <img src="../images/apple.png"><br><br>
          <img src="../images/grey.png" width="60px"> 
          <img src="../images/blue.png" width="60px"> 
          <img src="../images/green.png" width="60px">    
        </p>
        <br>
         <a href=""><i class="material-icons">arrow_back</i>Previous</a>
         <span class="alignright"><a href="">Next<i class="material-icons">arrow_forward</i></a></span>
        <br>  
       </div>
      <div class="col-sm" style="background-color:#FFFFFF; margin: 5px; height:auto;">
          <p class="img_center" style="padding-top:25px;">
            <img src="../images/game/badge.png"><br><br>
          To date you've gotten 12 correct!<br>
            <img src="../images/game/stars.png" width="150px"><br><br>
          </p>
      </div>  
    
        
        </div><!--.row --> 
        </div><!--.container-->
     
   
     </div>
     </div>
   
   <footer><!--FOOTER CONTAINER-->
   <nav class="navbar fixed-bottom navbar-expand navbar-light bg-light"><!--START BOTTOM NAVBAR-->
             <a class="nav-link" href="http://trackingtrash.com/" target="blank">Contact Us</a> 
             |
             <a class="nav-link" href="">Privacy and Policy</a>
         </div>
     </nav><!--END BOTTOM NAVBAR-->
   </footer><!--.FOOTER-->
   
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
</html>

<!--
    DENISE THUY VY NGUYEN
    2/1/2018

    KEVIN TRUEBE
    3/2/2018
-->

    © 2018 GitHub, Inc.
    Terms
    Privacy
    Security
    Status
    Help
>>>>>>> remotes/origin/kevins_branch
