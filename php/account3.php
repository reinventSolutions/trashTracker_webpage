<?php include "../../DB/dbinfo.php"; ?>

<?php
session_start();
?>

<?php
session_start();

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
        <!--CSS-->
        <link rel="stylesheet" href="../css/stylesheet.css">
        <!--CSS MEDIA QUERY-->
        <link rel="stylesheet" href="../css/stylesheet2.css">
        <!-- ICONS https://material.io/icons/#ic_cloud-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--POPOVER
        https://www.w3schools.com/bootstrap4/bootstrap_popover.asp
        -->
        <script type="text/javascript" src="../js/popover.js"></script>
        <!--GRAPH-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <!--GRAPH-->
      
</head>

<body><!--START OF BODY-->     
  <header style=""> <!--START OF HEADER-->
    <!--START OF NAV-->  
    <?php include "temps/header.php"; ?>
  </header><!--END OF HEADER-->
  
  <!-- GENERAL INFO--> 
  <?php include "temps/generalinfo.php"; ?>
    
<!--RIGHT--> 
<div class="container" id="info" style="background-color:#b4b4b4;  width:800px; height:auto;">
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
    <!--GRAPH DIV-->
		<div id = "graphdata">

		</div>

    <!-- gets the data and fills into the empty div -->
		<script type = "text/javascript">
		$("#graphdata").load("graph1.php");
		</script>
      <a href = "prevWeek.php" id = "pastWeek"><i class="material-icons">arrow_back</i>
        Past Week
      </a>
		  <span class="alignright">
	  	<button>Next Week</button>
      <!-- <a href = "" id = "nextWeek">Next Week<i class="material-icons">arrow_forward</i></a> -->
		  </span>
    <!-- BUTTOM FUNCTION   -->
    <script type = "text/javascript">
		$(document).ready(function(){
      $('button').click(function(e){
        alert(1);
		//$.get("graph2.php #graphdata", function(data){
		//$("#graphdata").replaceWith(data);
		//});
    	});
		});
		</script>
    <!--GRAPH CHART-->
      <div id="chart_div" class="hcGraph" style="height:500px;">





      </div>

<!--Normal Comparison-->
<?php include "temps/normalComp.php"; ?>

<!--RECYCLE GAME-->
<?php include "temps/game.php"; ?>
<footer><!--FOOTER CONTAINER-->
 <nav class="navbar fixed-bottom navbar-expand navbar-light bg-light"><!--START BOTTOM NAVBAR-->
    <a class="nav-link" href="http://trackingtrash.com/" target="blank">Contact Us</a> 
    |
    <a class="nav-link" href="">Privacy and Policy</a>
  </nav><!--END BOTTOM NAVBAR-->
</footer><!--.FOOTER-->
   
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
          integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
          integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
          integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
</html>

<!--
    DENISE THUY VY NGUYEN
    2/1/2018
    SCOTTY - PHP/GAME
    KEVIN - PHP/SESSIONS
-->