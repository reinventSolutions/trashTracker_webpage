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
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">

		
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script type="text/javascript" src="../js/popover.js"></script>
        <!--GRAPH-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <!--<script type="text/javascript" src="../js/graph.js"></script>-->          
        
        <!--PHP pulls data into graph
        https://stackoverflow.com/questions/39658251/how-to-use-php-echo-data-in-order-to-populate-a-google-chart
        -->
</head>

<body> <!--START OF BODY-->     
 <header style="margin-bottom:20px;"> <!--START OF HEADER-->
  <!--START OF NAV-->  
 <!--HEADER-->
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
</header><!--END OF HEADER-->

<!--LEFT CONTAINER--> 
<div class="container" style="background-color:#818285;">
  <div class="row">
    
  <!--LEFT--> 
  <div class="oneLeft" id="info" style="margin-left: 35px;">
  <div class="row"><!--.row-->
    <div class="onel" style=""><!--LOGO-->
    <?php 

    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){?>
    <p> Welcome <?php echo $_SESSION["name"]; ?></br>
    <strong>Your Address:</strong> <br/>
    <?php echo $_SESSION["Address"]; ?><br/>
    <?php echo $_SESSION["City"]; ?>
    <?php echo $_SESSION["St"]; ?>
    <?php echo $_SESSION["Zip"]; ?><br/>
    <?php } ?>
    
    <br/>
    <a href="settings.php"> 
      <button type="button" class="btn btn-outline-secondary" style="margin-bottom: 5px;" href="settings.php">Settings</button>
    </a>    
    &nbsp;	
    <a href="logout.php"> 
      <button type="button" class="btn btn-outline-secondary" style="margin-bottom: 5px;" onclick="logout.php" href="">Logout</button>
    </a>     

    </div><!--LOGO-->
  </div><!--.row-->

<!--BIN INFO-->
<div class="row">
<div class="twol" style=""><!--BIN INFO-->
  <strong>Your Bins:</strong><br/>
    <a href="#" title="Trash" data-toggle="popover" data-trigger="hover" data-html='true' data-content =<?php echo $binID1; ?>
      <button type="button" class="">
       <img src="../images/grey.png" width="32px">
      </button>
    </a>
    <a href="#" title="Recycling" data-toggle="popover" data-trigger="hover" data-html='true' data-content =<?php echo $binID2; ?>
      <button type="button" class="">
       <img src="../images/blue.png" width="30px">
      </button>
      </a>
    <a href="#" title="Greenwaste" data-toggle="popover" data-trigger="hover" data-html='true' data-content =<?php echo $binID3; ?>
      <button type="button" class="">
       <img src="../images/green.png" width="30px">
      </button>
    </a><br/>
    <span class="img_center">Hover for more information </span>
   </div><!--.col-->
  </div><!--.row-->
  
  <!--NEXT PICK UP-->
  <div class="row">
  <div class="onel" style="">
  <img src="../images/recycle.png" width="100px"><br>
     <strong>Next Pick Up:</strong> <br>
    <?php echo $_SESSION["NextPickup"]; ?> <br>
    </div>
 </div>

<!--RATIO-->
 <div class="row">
  <div class="onel" style="">
  <p class="img_center">
    <img src="../images/greenhouse.png" width="50%"></br>
     <strong>Your Ratio:</strong> <br>
    <?php echo $_SESSION["HouseCompare"]; ?>%<br>
    </p>
    </div>
 </div>


</div><!--LEFT--> 

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
		
		<script type = "text/javascript">
		$("#graphdata").load("graph1.php");
		</script>
		
        <a href = "prevWeek.php" id = "pastWeek"><i class="material-icons">arrow_back</i>Past Week</a>
		<span class="alignright">
		<input type= "button" id = "button" class="btn btn-sm btn-success" value = "Next Week"/>
        <!-- <a href = "" id = "nextWeek">Next Week<i class="material-icons">arrow_forward</i></a> -->
		</span>
		
		<!--		-->
		
		<!--		-->
		<script type = "text/javascript">
		$(document).ready(function(){
		$('#button').click(function(){
		$("#graphdata #graph2.php").replaceWith("graph2.php");
		});
		});
		</script>
        <div id="chart_div" class="hcGraph" style="height:500px;">
        <!--GRAPH CHART-->
        </div>
	 <?php include "comparison.php"; ?>
	 
     </div><!--thumbs-->
    </div><!--.col-->
    
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

         <p class="img_center">
      </br>
          <img src="../images/greenhouse.png" width="10%"></br>
          <strong>Your Ratio: </strong> 
          <?php echo $_SESSION["HouseCompare"]; ?>%<br>
          </p>
        <p>
            We calculated the percent of waste you recycled this month, and found that you recycled more and 
            sent less landfill than your neightbors did. 
        </p>

      <center><strong>Neighborhood Average:</strong> 
      <?php echo $_SESSION["NCompare"]; ?>%</center>
        
        <!--HOUSES-->
        <div class="threel id="orangegreenhouse" onload="switchImage()">
          <div class="child">

          <script type ="text/javascript">
          switchImage();
          function switchImage(){

            var owner = <?php echo $housecompare ?>;
            var neighbor = <?php echo $neighborcomparison?>;
            var elem = document.createElement("img")

            document.getElementById("orangegreenhouse").appendChild(elem).style.width = "50%";
        if(neighbor < owner)
        elem.src = '../images/orangehouse.png';
        else
        elem.src = '../images/greenhouse.png';
        }
          </script>
           <?php echo $_SESSION["N1"]; ?> 
          </div>
          <div class="child">
            <img src="../images/greenhouse.png" width="50%"></br>
            <?php echo $_SESSION["N2"]; ?> 
          </div>
          <div class="child">
            <img src="../images/greenhouse.png" width="50%"></br>
            <?php echo $_SESSION["N3"]; ?>
          </div>
          <div class="child">
            <img src="../images/greenhouse.png" width="50%"></br>
            <?php echo $_SESSION["N4"]; ?> 
          </div>
          <div class="child">
            <img src="../images/greenhouse.png" width="50%"></br>
            <?php echo $_SESSION["N5"]; ?> 
          </div>
        </div>

    
     </div><!--.col-sm 8-->
    </div><!--.row-->
  </div><!--.container-->
  </div>
  </div>
        
 <!--RECYCLE GAME-->
 <div class="row">
 <div class="container" style="background-color:rgb(38, 112, 65); margin-top: 10px; margin-bottom: 80px; text-align:center;">  
        <span class="img_center">
         <h3>Trash Tracker Game!</h3>
        </span>
        
    <div class="col" style="background-color:#FFFFFF; margin: 5px 0px; height:310px; text-align:center;">
    <br/>
    <p><strong>Score:</strong> <text id = "score001">0</text></p>

    <div class = "box002" ondrop = "drop001(event)">
      <div ondragstart = "dragStart001(event)" draggable = "true" id = "target001">
        <img src="../images/game/grey/cig.png" width="50px" id = "target001">
      </div>
    </div>
    <div class = "box002" ondrop = "drop002(event)">
      <div ondragstart = "dragStart002(event)" draggable = "true" id = "target002">
      <img src="../images/game/blue/aluminum.png" width="50px" id = "target002">
    </div>
    </div>
    <div class = "box002" ondrop = "drop003(event)">
      <div ondragstart = "dragStart003(event)" draggable = "true" id = "target003">
      <img src="../images/game/green/egg.png" width="50px" id = "target003">
      </div>
    </div>
    <div class = "box002" ondrop = "drop001(event)">
      <div ondragstart = "dragStart001(event)" draggable = "true" id = "target001">
        <img src="../images/game/grey/mirror.png" width="50px" id = "target001">
      </div>
    </div>
    <div class = "box002" ondrop = "drop002(event)">
      <div ondragstart = "dragStart002(event)" draggable = "true" id = "target002">
       <img src="../images/game/blue/glass.png" width="50px" id = "target002">
      </div>
    </div>
    <br></br><br></br>

    <div class = "box001" ondrop = "drop006(event)" ondragover = "allowDrop001(event)" id = "place001">
      <img src="../images/grey.png" width="75px">
    </div>
    
    <div class = "box001" ondrop = "drop007(event)" ondragover = "allowDrop002(event)" id = "place002">
      <img src="../images/blue.png" width="75px">
    </div>

    <div class = "box001" ondrop = "drop008(event)" ondragover = "allowDrop003(event)" id = "place003">
     <img src="../images/green.png" width="75px">
    </div>
  
	<script>
    var b = 0;
    b++;
    function dragStart001(event){
      event.dataTransfer.setData("choice001", event.target.id);
    }
    function allowDrop001(event){
      event.preventDefault();
    }
    function dragStart002(event){
      event.dataTransfer.setData("choice002", event.target.id);
    }
    function allowDrop002(event){
      event.preventDefault();
    }
    function dragStart003(event){
      event.dataTransfer.setData("choice003", event.target.id);
    }
    function allowDrop003(event){
      event.preventDefault();
    }

    function drop006(event){
      var data = event.dataTransfer.getData("choice001");
      event.target.appendChild(document.getElementById(data));
      score001.innerHTML = b++;
      //place001.innerHTML = "1";
    }
    function drop007(event){
      var data = event.dataTransfer.getData("choice002");
      event.target.appendChild(document.getElementById(data));
      score001.innerHTML = b++;
      //place002.innerHTML = "2";
    }
    function drop008(event){
      var data = event.dataTransfer.getData("choice003");
      event.target.appendChild(document.getElementById(data));
      score001.innerHTML = b++;
      //place003.innerHTML = "3";
    }
	</script>
    </div>    
	</div>
</div><!--.row --> 

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