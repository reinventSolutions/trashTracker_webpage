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
    <script type="text/javascript" src="../js/nextWeek.js"></script>
    <script type="text/javascript" src="../js/prevWeek.js"></script>        
    <!--PHP pulls data into graph-->
    <?php include "graph.php"; ?>
    <?php include "comparison.php"; ?>
    <!--GRAPH SCRIPT-->
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        <?php echo $data; ?>
    
        var options = {
          chart: {
            title: 'Trash Tracker',
            subtitle: 'Weekly Trash View',
          },
          axes: {
              y: {
                  all: {
                      range: {
                          y: 100,
                          y:75,
                          y:50,
                          y:25,
                          y: 0
                      }
                  }
              }
          },
          bars: 'vertical',
          vAxis: {
              title: 'Total weight in pounds',
              format: 'decimal',
              minValue: 0,
            },
          colors: ['#0066ff', '#808080', '#7aac3b']
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
        var btns = document.getElementById('btn-group');
        btns.onclick = function (e) {
          if (e.target.tagName === 'BUTTON') {
            options.vAxis.format = e.target.id === 'none' ? '' : e.target.id;
            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        }
      }
    </script>
    <!--FUNCTIONS FOR IMAGE HOUSE FLIPS/THUMBS STACK-->
    <script type="text/javascript" src="../js/nchouse.js"></script>
    <script type ="text/javascript">
        //GENERAL INFO YOUR RATIO 
        ratioInfo();
        function ratioInfo(){
        var owner = "<?php echo $housecompare ?>";
        var neighbor = "<?php echo $neighborcomparison?>";
        var elem = document.createElement("img")
        document.getElementById("yourratiobig").appendChild(elem).style.width = "50%";
        if(owner < neighbor)
          elem.src = '../images/orangehouse.png';
        else
        elem.src = '../images/greenhouse.png';
        }
        //THUMBS FUNCTION
        function thumbs(){
          var owner = <?php echo $housecompare ?>;
          var neighbor = <?php echo $neighborcomparison?>;
          var elem = document.createElement("img")
          document.getElementById("thumbupdown").appendChild(elem).style.width = "50%";
        if(neighbor < owner)
         elem.src = '../images/thumb.png';
        else
         elem.src = '../images/thumbDown.png';
        }
        //MAIN RATIO 
        function mainRatio(){
          var owner = <?php echo $housecompare ?>;
          var neighbor = <?php echo $neighborcomparison?>;
          var elem = document.createElement("img")
          document.getElementById("yourratio").appendChild(elem).style.width = "15%";
          document.getElementById("yourratio").style.aligncontent = "center";
        if(owner < neighbor)
          elem.src = '../images/orangehouse.png';

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
          elem.src = '../images/orangehouse.png';
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
          elem.src = '../images/orangehouse.png';
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
          elem.src = '../images/orangehouse.png';
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
          elem.src = '../images/orangehouse.png';
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
          elem.src = '../images/orangehouse.png';
        else
          elem.src = '../images/greenhouse.png';
        }
      </script>
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
<!--LEFT CONTAINER--> 
<div class="container"><!--MAIN CONTAINER-->
  <div class="row">
  <!--LEFT--> 
  <div class="oneLeft" id="info">
  <div class="row"><!--.row-->
  <!--INFO-->
   <div class="onel" style="">
    <?php 
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){?>
      <p> Welcome 
        <span class="name"><?php echo $_SESSION["name"]; ?></span>
      </br>
      <strong>Your Address:</strong> <br/>
      <?php echo $_SESSION["Address"]; ?><br/>
      <?php echo $_SESSION["City"]; ?>
      <?php echo $_SESSION["St"]; ?>
      <?php echo $_SESSION["Zip"]; ?><br/>
    <?php } ?><br/>
    <a href="settings.php"> 
      <button type="button" class="btn btn-outline-secondary" style="margin-bottom: 5px;" href="settings.php">Settings</button>
    </a>    
    &nbsp;	
    <a href="logout.php"> 
      <button type="button" class="btn btn-outline-secondary" style="margin-bottom: 5px;" onclick="logout.php" href="">Logout</button>
    </a>     
   </div><!--.INFO-->
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
<!--.BIN INFO-->
<!--NEXT PICK UP-->
<div class="row">
  <div class="onel" style="">
  <img src="../images/recycle.png" width="100px"><br>
    <strong>Next Pick Up:</strong> <br>
    <?php echo $_SESSION["NextPickup"]; ?> <br>
  </div>
 </div>
<!--.NEXT PICK UP-->
<!--RATIO-->
 <div class="row">
  <div class="onel" id= "yourratiobig">
   <p class="img_center">
     <script>ratioInfo();</script>
     <strong>Your Ratio:</strong> <br>    
     <?php echo $_SESSION["HouseCompare"]; ?>%<br>
   </p>
  </div><!--.onel-->
 </div><!--.row-->
<!--.RATIO-->
</div><!--.LEFT--> 
<!--=========================================-->
<!--RIGHT--> 
<div class="container" id="info" style="background-color:#b4b4b4; padding: 25px; width:850px; height:auto;">
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
      <a href="prevWeek.php" id = "pastWeek"><i class="material-icons">arrow_back</i>Past Week</a>
      <span class="alignright">
        <a href="nextWeek.php" id = "nextWeek">Next Week<i class="material-icons">arrow_forward</i></a>
      </span>
      <!--GRAPH CHART-->
      <div id="chart_div" class="hcGraph" style="height:500px;">
        
      </div>
      <!--GRAPH CHART BUTTONS    
      <div id="btn-group">
      <button class="button button-blue" id="none">No Format</button>
      <button class="button button-blue" id="scientific">Scientific Notation</button>
      <button class="button button-blue" id="decimal">Decimal</button>
      <button class="button button-blue" id="short">Short</button>
      </div>-->
    </div><!--.col-sm-->
  </div><!--.row-->
    
  <div class="row">
  <!--Normal Comparison-->
  <div class="col" style="background-color:#FFFFFF; margin: 5px;"><br/><!--thumbs-->
    <h4>How do you stack up?</h4>
    <div class="thumbs" id="thumbupdown" onload="thumbs()" style="text-align: center;">
      <script> thumbs();</script>
    </div><!--.thumbs-->
   </div><!--.col-->
  <!--NORMAL COMP INFO--> 
  <div class="col-sm-8" id ="yourratio" style="background-color:#FFFFFF; margin: 5;text-align: center;">
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
    <!--HOUSE SCRIPT-->
    <br/>
      <script>mainRatio();</script>
      <br/><strong>Your Ratio: </strong> 
        <?php echo $_SESSION["HouseCompare"]; ?>%
      <br>
      <p style="text-align:left">
        We calculated the percent of waste you recycled this month, and found that you recycled more and 
        sent less landfill than your neightbors did. 
      </p>
      <p class="img_center">
        <strong>Neighborhood Average: </strong> 
        <?php echo $_SESSION["NCompare"]; ?>%
      </p>
      <!--5 HOUSES-->
      <div class="meow">
       <div class="mew" id="orangegreenhouse1">
        <script> switchImageN1(); </script>
        <br>
        <?php echo $_SESSION["N1"]; ?> 
      </div>
      <div class="mew" id="orangegreenhouse2">
        <script> switchImageN2(); </script>
        <br>
        <?php echo $_SESSION["N2"]; ?> 
      </div>
      <div class="mew" id="orangegreenhouse3">
        <script> switchImageN3(); </script>
        <br>
        <?php echo $_SESSION["N3"]; ?>
      </div>
      <div class="mew" id="orangegreenhouse4">
        <script> switchImageN4(); </script>
        <br>
        <?php echo $_SESSION["N4"]; ?> 
      </div>
      <div class="mew" id="orangegreenhouse5">
        <script> switchImageN5(); </script>
        <br>
        <?php echo $_SESSION["N5"]; ?> 
      </div>
     </div><!--.meow-->
     <!--.5 HOUSES-->
    </div><!--.col-sm 8-->
   </div><!--.row-->
  </div><!--.container-->
 </div><!--.row-->
</div><!--.LEFT-->
        
<!--RECYCLE GAME-->
<div class="container" style="background-color:#b4b4b4;  margin-top: 10px; margin-bottom: 80px; 
                              padding:10px; text-align:center;">  
  <span class="img_center">
    <h3>Trash Tracker Game!</h3>
  </span>
  <div class="col" style="background-color:#FFF; margin-left: auto; margin-right: auto; margin-bottom:20px; 
                          height:310px; padding-left:20%; ppadding-right: 20%; text-align:center;"><br/>
  <!--DRAGGABLE OBJECTS/ TRASH-->
  <div class = "box002" ondrop = "drop001(event)">
    <div ondragstart = "dragStart001(event)" draggable = "true" id = "target001a">
      <img src="../images/game/grey/cig.png" width="50px" id = "target001a">
    </div>
  </div>
  <div class = "box002" ondrop = "drop002(event)">
    <div ondragstart = "dragStart002(event)" draggable = "true" id = "target002a">
    <img src="../images/game/blue/aluminum.png" width="50px" id = "target002a">
  </div>
  </div>
  <div class = "box002" ondrop = "drop003(event)">
    <div ondragstart = "dragStart003(event)" draggable = "true" id = "target003">
    <img src="../images/game/green/egg.png" width="50px" id = "target003">
    </div>
  </div>
  <div class = "box002" ondrop = "drop001(event)">
    <div ondragstart = "dragStart001(event)" draggable = "true" id = "target001b">
      <img src="../images/game/grey/mirror.png" width="50px" id = "target001b">
    </div>
  </div>
  <div class = "box002" ondrop = "drop002(event)">
    <div ondragstart = "dragStart002(event)" draggable = "true" id = "target002b">
      <img src="../images/game/blue/glass.png" width="50px" id = "target002b">
    </div>
  </div>
  <!--.DRAGGABLE OBJECTS/ TRASH-->
  <br></br><br></br>
  <!--TRASH CANS-->
  <div class = "box001" ondrop = "drop006(event)" ondragover = "allowDrop001(event)" id = "place001">
    <img src="../images/grey.png" width="75px">
  </div>
  <div class = "box001" ondrop = "drop007(event)" ondragover = "allowDrop002(event)" id = "place002">
    <img src="../images/blue.png" width="75px">
  </div>
  <div class = "box001" ondrop = "drop008(event)" ondragover = "allowDrop003(event)" id = "place003">
    <img src="../images/green.png" width="75px">
  </div>
  <div class ="row"></div>

  <!--.TRASH CANS-->
</div><!--.col -->     
<div class="col" style="background-color:#FFF">
<p>
  <strong class="alignleft">Score:</strong> 
  <text id = "score001">0</text>
  <p id="game">
  
  </p>
</p>
</div>
</div><!--.container-->
</div><!--.row --> 


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
    
    //WASTE
    function drop006(event){
     var data = event.dataTransfer.getData("choice001");  
     if(data === ""){
      alert("wrong!");
     }
     else{    
      alert('Correct');
     }
     event.target.appendChild(document.getElementById(data));
     score001.innerHTML = b++;
     //place001.innerHTML = "1";
    }

    //RECYCLE
    function drop007(event){
      var data = event.dataTransfer.getData("choice002");
      if(data === ""){
        alert("wrong!");
      }
      else{    
        alert('Correct');
      }
      event.target.appendChild(document.getElementById(data));
      score001.innerHTML = b++;
      //place002.innerHTML = "2";
    }

    //GREENWASTE
    function drop008(event){
      var data = event.dataTransfer.getData("choice003");
      if(data === ""){
        alert("wrong!");
      }
      else{    
       alert('Correct');
      }
      event.target.appendChild(document.getElementById(data));
      score001.innerHTML = b++;
      //place003.innerHTML = "3";
    }
	</script>

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