<?php
session_start();
?>
<?php include "../../DB/dbinfo.php"; ?>
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
        <!--<script type="text/javascript" src="../js/graph.js"></script>-->          
        
        <!--PHP pulls data into graph
        https://stackoverflow.com/questions/39658251/how-to-use-php-echo-data-in-order-to-populate-a-google-chart
        -->
        <?php
            ini_set('track_errors', 1);
            ini_set('display_errors', 1);
            ini_set('log_errors', 1);
            ini_set("memory_limit","64M");
            ini_set("max_execution_time","30");
            @ob_implicit_flush(true);
            @ob_end_flush();
            $_SELF=$_SERVER['PHP_SELF'];
            
            /* Connect to MySQL and select the database. */
            $connection = mysqli_connect($DBservername, $DBusername, $DBpassword);

              if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
                else 
                  echo "<p>Connected into database</p>";

              $database = mysqli_select_db($connection, $DBname);  
                if (mysqli_connect_errno()) echo "Failed to connect to selected db" . mysqli_connect_error();
                  else 
                      echo "<p>Connected to the database now select table</p>";
					  
					  $house = $_SESSION['House'];
					  
					  //BinID info
					  $binIDquery = "SELECT Bin
									 FROM Bins
									 WHERE HouseID = $house";
									  
					  $fetchBinsID = mysqli_query($connection, $binIDquery);
					   $binIDArray = Array();
					   while($row = mysqli_fetch_array($fetchBinsID)){
						   $binIDArray[] = $row[0];
					   }
					  $binID1 = $binIDArray[0];
					  $binID2 = $binIDArray[1];
					  $binID3 = $binIDArray[2];
					  //BinID info End
					  
					  $getBins = "SELECT Bin
								  FROM Bins
								  WHERE HouseID = ( 
									SELECT House
									FROM Houses
									WHERE House ='$house')";
										   
					   $fetchBins = mysqli_query($connection, $getBins);
					   $storeArray = Array();
					   while($row = mysqli_fetch_array($fetchBins)){
						   $storeArray[] = $row[0];
					   }
					   
					   $bin1 = $storeArray[0];
					   $bin2 = $storeArray[1];
					   $bin3 = $storeArray[2];
						
					  $binData = "SELECT Wk, BinWeight
					  FROM Weights
					  WHERE binID = '$bin1' OR binID = '$bin2' OR binID = '$bin3'
					  LIMIT 12";
					  
					  $result = mysqli_query($connection, $binData);
					  
                      $data = "var data = new google.visualization.DataTable();\n\r"
                      ."data.addColumn('number', 'Week');\n\r"
                      ."data.addColumn('number', 'Weight');\n\r\n\r"
                      ."data.addRows([\n\r";
                      while($query_data = mysqli_fetch_row($result)) {
                        $week = (int)$query_data[0];
                        $weight = (int)$query_data[1];
                        $data = $data."  [".$week.", ".$weight."],\n\r";
                      }
                        $data = $data."]);\n\r";
                //Print data to check if data from database is loaded
                echo $data;
        ?>       
        
        <!-- Clean up. -->
        <?php
          mysqli_free_result($result);
          mysqli_close($connection);
        ?>

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

<body> <!--START OF BODY-->     
 <header style="margin-bottom:20px;"> <!--START OF HEADER-->
  <!--START OF NAV-->  
 <!--HEADER-->
<div class="container-fluid" id="id" style="background-color:#b4b4b4;"><!--container-fuild-->
  <div class="row" style="padding: 0 15px"><!--ROW-->
    <div class="col-sm" style="background-color:#FFFFFF; margin: 5px 0px; text-align:center; padding: 15px;"><!--LOGO-->
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
    Your Address: 
    <br/><?php echo $_SESSION["Address"]; ?><br/>
    <?php echo $_SESSION["City"]; ?><br/>
    <?php echo $_SESSION["St"]; ?><br/>
    <?php echo $_SESSION["Zip"]; ?><br/>

    <?php } ?>
    <br/>
    <a href="settings.php"> 
      <button type="button" class="btn btn-outline-secondary" href="settings.php">Settings</button>
    </a>    

    <a href="logout.php"> 
      <button type="button" class="btn btn-outline-secondary" onclick="logout.php" href="">Logout</button>
    </a>     

    </div><!--LOGO-->
  </div><!--.row-->

<!--BIN INFO-->
<div class="row">
<div class="twol" style=""><!--BIN INFO-->
  <h6>Your bins</h6>
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
    </a>
    <h6 class="img_center">Click for more information</h6>  
   </div><!--.col-->
  </div><!--.row-->
  <!--NEXT PICK UP-->
  <div class="row">
  <div class="threel" style="">
  <img src="../images/recycle.png" width="100px"><br>
     NEXT PICK UP: <br>
    <?php echo $_SESSION["NextPickup"]; ?> <br>
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
        <a href=""><i class="material-icons">arrow_back</i>Past Week</a>
        <span class="alignright">
        <a href="">Next Week<i class="material-icons">arrow_forward</i></a>
        </span>
        <div id="chart_div" style="padding: 10px; width: 100%;">
        <!--GRAPH CHART-->
        </div>
    
        <div id="btn-group">
        <button class="button button-blue" id="none">No Format</button>
        <button class="button button-blue" id="scientific">Scientific Notation</button>
        <button class="button button-blue" id="decimal">Decimal</button>
        <button class="button button-blue" id="short">Short</button>
        </div>
        </div><!--.col-sm-->
    </div><!--.row-->        
    
    <div class="row">
    <!--Normal Comparison-->
    <div class="col" style="background-color:#FFFFFF; margin: 5px;">
    <h4>How do you stack up?</h4>
    <div class="thumbs" id="thumbupdown" onload="loadImage()" style="text-align: center;">
    <script type="text/javascript">
        loadImage();
        function loadImage()
        {
        var elem = document.createElement("img")
        document.getElementById("thumbupdown").appendChild(elem).style.width = "50%";
        if(Math.random() < 0.5)
        elem.src = '../images/thumb.png';
        else
        elem.src = '../images/thumbDown.png';
        }
        </script>  
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
        <p>
            We calculated the percent of waste you recycled this month, and found that you recycled more and 
            sent less landfill than your neightbors did. 
        </p>
     </div><!--.col-sm 8-->
    </div><!--.row-->
  </div><!--.container-->
  </div>
  </div>
        
 <!--RECYCLE GAME-->
 <div class="row">
    <div class="container" style="background-color:rgb(38, 112, 65); margin-top: 10px; margin-bottom: 80px;">  
        <span class="img_center">
         <h3>Trash Tracker Game!</h3>
        </span>
        
    <div class="col" style="background-color:#FFFFFF; margin: 5px 0px; height:500px;">
    <style>
	.box001{
	float: left;
	width: 75px;
	height: 15px;
	margin: 12px;
	padding: 10px;
	border: 1px solid black;
	}
	.box002{
	float: left;
	width: 75px;
	height: 15px;
	margin: 12px;
	padding: 10px;
	border: 1px solid white;
	}
	</style>
   <p>Score: <text id = "score001">0</text></p>

	<div class = "box002" ondrop = "drop001(event)">
	<div ondragstart = "dragStart001(event)" draggable = "true" id = "target001">1</div>
	</div>
	<div class = "box002" ondrop = "drop002(event)">
	<div ondragstart = "dragStart002(event)" draggable = "true" id = "target002">2</div>
	</div>
	<div class = "box002" ondrop = "drop003(event)">
	<div ondragstart = "dragStart003(event)" draggable = "true" id = "target003">3</div>
	</div>
	<div class = "box002" ondrop = "drop001(event)">
	<div ondragstart = "dragStart001(event)" draggable = "true" id = "target001">1</div>
	</div>
	<div class = "box002" ondrop = "drop002(event)">
	<div ondragstart = "dragStart002(event)" draggable = "true" id = "target002">2</div>
	</div>
	<br></br><br></br>
	<div class = "box001" ondrop = "drop006(event)" ondragover = "allowDrop001(event)" id = "place001">1</div>
	<div class = "box001" ondrop = "drop007(event)" ondragover = "allowDrop002(event)" id = "place002">2</div>
	<div class = "box001" ondrop = "drop008(event)" ondragover = "allowDrop003(event)" id = "place003">3</div>

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
	place001.innerHTML = "1";
	}
	function drop007(event){
	var data = event.dataTransfer.getData("choice002");
	event.target.appendChild(document.getElementById(data));
	score001.innerHTML = b++;
	place002.innerHTML = "2";
	}
	function drop008(event){
	var data = event.dataTransfer.getData("choice003");
	event.target.appendChild(document.getElementById(data));
	score001.innerHTML = b++;
	place003.innerHTML = "3";
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
-->