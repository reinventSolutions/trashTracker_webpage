<?php include "../../DB/dbinfo.php"; ?>
<?php 
session_start();
?>

<?php session_start();

if($_SESSION['logged_in'] != true)
  header("Location: index.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trash Tracker</title>
    <link rel="icon" href="../images/trashtracker.png"/>
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!--CSS-->
    <link rel="stylesheet" href="../css/stylesheet.css">
    <!--CSS MEDIA QUERY-->
    <link rel="stylesheet" href="../css/stylesheet2.css">
    <!--GRAPH-->
	<script type="text/javascript" src="../js/button.js"></script>
	</head>
<!--START OF BODY-->  
<body>    
<header style="margin-bottom:20px;"> <!--START OF HEADER-->
<!--START OF NAV-->  
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
</header>
<!--END OF HEADER-->
<!--=========================================-->
<!--RIGHT--> 
<div class="container" id="info" style="background-color:#b4b4b4; padding: 25px; width:850px; height:auto;">
 <div class="row">
    <!--Historical Comparison-->
    <div class="col" style="background-color:#FFFFFF; margin: 5px; height:auto;">
      <ul class="nav nav-tabs">
        <li class="nav-item">
         <input type = "button" id= "weeklyview" class="btn btn-sm btn" value = "Weekly View"/>
        </li>
        <li class="nav-item">
         <input type = "button" id= "monthlyview" class="btn btn-sm btn" value = "Monthly"/>
        </li>
        <li class="nav-item">
         <input type = "button" id= "yearlyview" class="btn btn-sm btn" value = "Yearly"/>
        </li>
      </ul>
	  <!-- Buttons for views -->
	  <div id = "weeklybuttons">
      <input type = "button" id = "prevweek" class="" value = "Prev Week"/>
      <span class="alignright">
      <input type = "button" id = "nextweek" class="" value = "Next Week"/>
      </span>
	  </div>
	  
	  <div id = "monthlybuttons">
      <input type = "button" id = "prevmonth" class="btn btn-sm btn-success" value = "Prev Month"/>
      <span class="alignright">
      <input type = "button" id = "nextmonth" class="btn btn-sm btn-success" value = "Next Month"/>
      </span>
	  </div>
	  <!-- meow 
	  <div id = "yearlybuttons">
      <input type = "button" id = "prevyear" class="btn btn-sm btn-success" value = "Prev Year"/>
      <span class="alignright">
      <input type = "button" id = "nextyear" class="btn btn-sm btn-success" value = "Next Year"/>
      </span>
	  </div>
    -->
	  <!-- end of buttons -->
	  <!-- Weekly/Monthly/Yearly graphs -->
    <div id="DData">

    </div>
	  <div id="chart_div" class="hcGraph" style="height:500px;">
        
    </div>
	  <div id="chart_div2" class="hcGraph" style="height:500px;">
        
    </div>
	  <div id="chart_div3" class="hcGraph" style="height:500px;">
        
    </div>
	  <!-- End of graph-->
	</div><!-- row -->
</div><!-- container -->

	

  <script type="text/javascript" src="../js/onload.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
          integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
          integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
</html>