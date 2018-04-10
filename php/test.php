<?php include "../../DB/dbinfo.php"; ?>

<?php
session_start();
?>

<?php
session_start();

if($_SESSION['logged_in'] != true)
  header("Location: index.php"); 
?>

<!doctype html>
<html>
 <head>
    <!--GRAPH-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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

 </head>

 <body>
 <!-- NAV -->
    <ul id="nav">
        <li>
        <a href="meow">MEOW</a>
        </li>
        <li>
        <a href="contact">GRAPH</a>
        </li>
    </ul>
<!-- PRINT CONTENT -->
<div id="content"></div>
<!--TESTING PHP CPNNECTION -->
<div class="" style="">
    <?php 
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){?>
    <p> Welcome <?php echo $_SESSION["name"]; ?></br>
    <strong>Your Address:</strong> <br/>
    <?php echo $_SESSION["Address"]; ?><br/>
    <?php echo $_SESSION["City"]; ?>
    <?php echo $_SESSION["St"]; ?>
    <?php echo $_SESSION["Zip"]; ?><br/>
    <?php } ?>
</div>
<!-- GRAPH -->
<div id="chart_div" class="hcGraph" style="height:500px;">    
</div>

 <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
 <script src="js/general.js"></script>

 </body> 
</html>
