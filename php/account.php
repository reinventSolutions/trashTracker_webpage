<!--  
    #######################################################
    FILENAME: account.php
    OVERVIEW: PHP page for Trash Tracker main page.
    PURPOSE: Data visualization for User Portal. Calls in 
    different PHP pages with itself. Includes: historicalComp.php,
    normalComp.php, and game.php and other graph data/ratio 
    PHP pages.
    #######################################################
--> 
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
    <!-- ICONS https://material.io/icons/#ic_cloud-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--GENERAL BIN INFO-->
    <script type="text/javascript" src="../js/popover.js"></script>
    <!--GRAPH-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- BUTTON FUNCTIONS FOR GOOGLE.CHARTS -->
    <script type="text/javascript" src="../js/button.js"></script>
		<!--FUNCTIONS FOR IMAGE HOUSE FLIPS/THUMBS STACK-->
    <!-- PHP FILES FOR  NORMAL COMPARISON -->
		<?php include "comparison.php"; ?>
		<?php include "routeavg.php"; ?>
		<?php include "cityavg.php"; ?>
    <!-- JS SCRIPTS FOR NORMAL AND GENERAL INFO -->
		<script type = "text/javascript">
        //GENERAL INFO YOUR RATIO
        ratioInfo();
        function ratioInfo(){
        var owner = "<?php echo $housecompare ?>";
        var neighbor = "<?php echo $neighborcomparison?>";
        var elem = document.createElement("img")
        document.getElementById("yourratiobig").appendChild(elem).style.width = "25%";
        if(owner < neighbor)
          elem.src = '../images/redhouse.png';
        else
        elem.src = '../images/greenhouse.png';
        }
        //THUMBS FUNCTION
        function thumbs(){
          var owner = <?php echo $housecompare ?>;
          var neighbor = <?php echo $neighborcomparison?>;
          var elem = document.createElement("img")
          document.getElementById("thumbupdown").appendChild(elem).style.width = "40%";
        if(neighbor < owner)
         elem.src = '../images/normalComp/thumbsUp.png';
        else
         elem.src = '../images/normalComp/thumbsDown.png';
        }
        function ttext1(){
          var owner = <?php echo $housecompare ?>;
          var neighbor = <?php echo $neighborcomparison?>;
          //var less = "less";
          //var more = "more";
          var elem = document.getElementById("tratio1");
        if(neighbor < owner)
          elem.innerHTML = "<b>Nice job!</b>";
        else
          elem.innerHTML = "<b>You can do better!</b>";
        }
        function thumbsN(){
          var owner = <?php echo $housecompare ?>;
          var route = <?php echo $routeTotalAverage?>;
          var elem = document.createElement("img")
          document.getElementById("thumbs2").appendChild(elem).style.width = "40%";
        if(route < owner)
         elem.src = '../images/thumb.png';
        else
         elem.src = '../images/rthumbDown.png';
        }
        function ttext2(){
          var owner = <?php echo $housecompare ?>;
          var neighbor = <?php echo $neighborcomparison?>;
          //var less = "less";
          //var more = "more";
          var elem = document.getElementById("tratio2");
        if(neighbor < owner)        
          elem.innerHTML = "<b>Well done!</b>";
        else
          elem.innerHTML = "<b>You have alot of neighbors!</b>";
        }
        function thumbsC(){
          var owner = <?php echo $housecompare ?>;
          var city = <?php echo $cityTotalAverage?>;
          var elem = document.createElement("img")
          document.getElementById("thumbs3").appendChild(elem).style.width = "40%";
        if(city < owner)
         elem.src = '../images/thumb.png';
        else
         elem.src = '../images/rthumbDown.png';
        }
        function ttext3(){
          var owner = <?php echo $housecompare ?>;
          var neighbor = <?php echo $neighborcomparison?>;

          var elem = document.getElementById("tratio3");
        if(neighbor < owner)
          elem.innerHTML = "<b>Amazing!</b>";
        else
          elem.innerHTML = "<b>It's okay, its the city!</b>";
        }
        //MAIN RATIO
        function nctext1(){
          var owner = <?php echo $housecompare ?>;
          var neighbor = <?php echo $neighborcomparison?>;
          var elem = document.getElementById("ncratio1");
        if(neighbor < owner)
          elem.innerHTML = "<b>more</b>";
        else
          elem.innerHTML = "<b>less</b>";
        }
        function nctext2(){
          var owner = <?php echo $housecompare ?>;
          var neighbor = <?php echo $neighborcomparison?>;
          //var less = "less";
          //var more = "more";
          var elem = document.getElementById("ncratio2");
        if(neighbor < owner)
           elem.innerHTML = "<b>less</b>";
        else
           elem.innerHTML = "<b>more</b>";
        }
        function mainRatio(){
          var owner = <?php echo $housecompare ?>;
          var neighbor = <?php echo $neighborcomparison?>;
          var elem = document.createElement("img")
          document.getElementById("mr").appendChild(elem).style.width = "15%";
          document.getElementById("mr").style.aligncontent = "center";
        if(owner < neighbor)
          elem.src = '../images/redhouse.png';
        else
          elem.src = '../images/greenhouse.png';
        }
        switchImageN1();
        function switchImageN1(){
          var owner = <?php echo $housecompare ?>;
          var neighbor = <?php echo $neighborcomparison?>;
          var elem = document.createElement("img")
          document.getElementById("orangegreenhouse1").appendChild(elem).style.width = "25%";
        if(neighbor < owner)
          elem.src = '../images/redhouse.png';
        else
          elem.src = '../images/greenhouse.png';
        }
        switchImageN2();
        function switchImageN2(){
          var owner = "<?php echo $housecompare ?>";
          var neighbor = "<?php echo $neighborcomparison?>";
          var elem = document.createElement("img")
          document.getElementById("orangegreenhouse2").appendChild(elem).style.width = "25%";
        if(neighbor < owner)
          elem.src = '../images/redhouse.png';
        else
          elem.src = '../images/greenhouse.png';
        }
        switchImageN3();
        function switchImageN3(){
          var owner = "<?php echo $housecompare ?>";
          var neighbor = "<?php echo $neighborcomparison?>";
          var elem = document.createElement("img")
          document.getElementById("orangegreenhouse3").appendChild(elem).style.width = "25%";
        if(neighbor < owner)
          elem.src = '../images/redhouse.png';
        else
          elem.src = '../images/greenhouse.png';
        }
        switchImageN4();
        function switchImageN4(){
          var owner = "<?php echo $housecompare ?>";
          var neighbor = "<?php echo $neighborcomparison?>";
          var elem = document.createElement("img")
          document.getElementById("orangegreenhouse4").appendChild(elem).style.width = "25%";
        if(neighbor < owner)
          elem.src = '../images/redhouse.png';
        else
          elem.src = '../images/greenhouse.png';
        }
        switchImageN5();
        function switchImageN5(){
          var owner = "<?php echo $housecompare ?>";
          var neighbor = "<?php echo $neighborcomparison?>";
          var elem = document.createElement("img")
          document.getElementById("orangegreenhouse5").appendChild(elem).style.width = "25%";
        if(neighbor < owner)
          elem.src = '../images/redhouse.png';
        else
          elem.src = '../images/greenhouse.png';
        }
		</script>
    <!-- Jquery for NORMAL COMP tab functions -->
		<script>
		$(document).ready(function(){
		$("#neighborInput").click(function(){
			$("#nav1").hide();//Closest
      $("#nav3").hide();//City
      $("#nav2").fadeIn(1000);
      $("#thumb1").hide();//Closest
      $("#thumb3").hide();//City
      $("#thumb2").fadeIn(1000);
		});
		$("#closestInput").click(function(){
			$("#nav2").hide();//Neighborhood
			$("#nav3").hide()//City
      $("#nav1").fadeIn(1000);
      $("#thumb2").hide();//Neighborhood
			$("#thumb3").hide()//City
      $("#thumb1").fadeIn(1000);
		});
		$("#cityInput").click(function(){
			$("#nav1").hide();//Closest
			$("#nav2").hide();//Neighborhood
      $("#nav3").fadeIn(1000);
      $("#thumb1").hide();//Closest
			$("#thumb2").hide();//Neighborhood
			$("#thumb3").fadeIn(1000);
		});
	})
	</script>
</head>

<!--BEGIN MAIN CONTENT-->
<body><!--START OF BODY-->
  <header style=""> <!--START OF HEADER-->
    <!--START OF NAV-->
    <?php include "temps/header.php"; ?>
  </header><!--END OF HEADER-->
    <?php include "temps/generalinfo.php"; ?>
  <!--RIGHT-->
  <div class="container" id="info" style="background-color:#b4b4b4; padding: 25px; width:850px; height:auto;">
   <div class="row">
   <!--Historical Comparison-->
    <?php include "temps/historicalComp.php"; ?>
	<div id="DData">

	</div>
  <div class="row">
   <!--Normal Comparison-->
   <?php include "closest.php"; ?>  
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
<!--<script type="text/javascript" src="../js/onload.js"></script>-->
  <!-- Jquery for pages and divs to load data after 
    **Has to be at the bottom or it won't work proberly
    creates DIVS and then handles the display, functionality and display visualizaton
  -->
  <script>
  $("#monthlybuttons").hide();
  $("#yearlybuttons").hide();
  $("#chart_div2").hide();
  $("#chart_div3").hide();
  $("#nav2").hide();//Neighborhood
  $("#nav3").hide();//City
  $("#chart_div").fadeOut(250);
  $("#DData").load("graph1.php");
  $("#chart_div").fadeIn(1000);
  $("#thumb2").hide();//Thumb Neighborhood
  $("#thumb3").hide();//Thumb City
  </script>
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
