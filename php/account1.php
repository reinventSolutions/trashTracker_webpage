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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script type="text/javascript" src="../js/popover.js"></script>
        <!--GRAPH-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="../js/nextWeek.js"></script>
        <script type="text/javascript" src="../js/prevWeek.js"></script>
        <!--<script type="text/javascript" src="../js/graph.js"></script>-->          
        
        <!--PHP pulls data into graph
        https://stackoverflow.com/questions/39658251/how-to-use-php-echo-data-in-order-to-populate-a-google-chart
        -->
        <?php include "graph.php"; ?>
        <?php include "comparison.php"; ?>
        <!--
          PHP to pull data from graphs
        -->
        <script type="text/javascript">
          /* https://jsfiddle.net/2f3kLtzq/5/
          */
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
        
        <script type ="text/javascript">
        //GENERAL INFO YOUR RATIO 
        function ratioInfo(){
          var owner = <?php echo $housecompare ?>;
          var neighbor = <?php echo $neighborcomparison?>;
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
        //NORMAL HOUSE AVERAGE ONE FOR EACH HOUSE
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
        function switchImageN2(){
          var owner = <?php echo $housecompare ?>; 
          var neighbor = <?php echo $neighborcomparison?>;
          var elem = document.createElement("img")
          document.getElementById("orangegreenhouse2").appendChild(elem).style.width = "25%";
        if(neighbor < owner)
          elem.src = '../images/orangehouse.png';
        else
          elem.src = '../images/greenhouse.png';
        }
        function switchImageN3(){
          var owner = <?php echo $housecompare ?>; 
          var neighbor = <?php echo $neighborcomparison?>;
          var elem = document.createElement("img")
          document.getElementById("orangegreenhouse3").appendChild(elem).style.width = "25%";
        if(neighbor < owner)
          elem.src = '../images/orangehouse.png';
        else
          elem.src = '../images/greenhouse.png';
        }
        function switchImageN4(){
          var owner = <?php echo $housecompare ?>; 
          var neighbor = <?php echo $neighborcomparison?>;
          var elem = document.createElement("img")
          document.getElementById("orangegreenhouse4").appendChild(elem).style.width = "25%";
        if(neighbor < owner)
          elem.src = '../images/orangehouse.png';
        else
          elem.src = '../images/greenhouse.png';
        }
        function switchImageN5(){
          var owner = <?php echo $housecompare ?>; 
          var neighbor = <?php echo $neighborcomparison?>;
          var elem = document.createElement("img")
          document.getElementById("orangegreenhouse5").appendChild(elem).style.width = "25%";
        if(neighbor < owner)
          elem.src = '../images/orangehouse.png';
        else
          elem.src = '../images/greenhouse.png';
        }
</script>
</head>

<body><!--START OF BODY-->     
  <header style=""> <!--START OF HEADER-->
    <!--START OF NAV-->  
    <?php include "temps/header.php"; ?>
  </header><!--END OF HEADER-->
  
  <!-- GENERAL INFO--> 
  <?php include "temps/generalinfo.php"; ?>
  
  <!--RIGHT--> 
<div class="container" id="info" style="background-color:#b4b4b4; padding: 25px; width:850px; height:auto;">
   <div class="row">
   <!--Historical Comparison-->
    <?php include "temps/historicalComp.php"; ?>
   <div class="row">
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