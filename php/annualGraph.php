<!-- 
    #######################################################
    FILENAME: annualGraph.php
    OVERVIEW: Displays Yearly
    PURPOSE: Works in conjunction with Jquery to update the 
		graphy. Updates the google charts by pulling updated
		data from DB.
    #######################################################
-->  
<?php include "../../DB/dbinfo.php"; ?>
		   <?php session_start(); ?>
		   <?php
            
            /* Connect to MySQL and select the database. */
            $connection = mysqli_connect($DBservername, $DBusername, $DBpassword);

              if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
                else 
                  //echo "<p>Connected into database</p>";

              $database = mysqli_select_db($connection, $DBname);  
                if (mysqli_connect_errno()) echo "Failed to connect to selected db" . mysqli_connect_error();
                  else 
                      //echo "<p>Connected to the database now select table</p>";
					  
					  $house = $_SESSION['House'];
					  
					  $getBins = "SELECT Bin
								  FROM Bins
								  WHERE HouseID = ( 
									SELECT House
									FROM Houses
									WHERE House ='".$house."')";
										   
					   $fetchBins = mysqli_query($connection, $getBins);
					   $storeArray = Array();
					   while($row = mysqli_fetch_array($fetchBins)){
						   $storeArray[] = $row[0];
					   }
					   $bin1 = $storeArray[0];
					   $bin2 = $storeArray[1];
					   $bin3 = $storeArray[2];
					   
					   $binData = "SELECT DISTINCT Yr
									FROM Weights
									WHERE (
									binID = '$bin1'
									OR binID = '$bin2'
									OR binID ='$bin3'
									)
									AND Yr >= 2018
									AND Yr <= 2018
									ORDER BY Yr ASC";
									
					 //Gets all bin weights
					  $binData1bin1 = "SELECT (
								SELECT SUM( BinWeight ) 
								FROM Weights
								WHERE Yr =2018
								AND BinID = '$bin1'
								) AS bin1";
					  $binData1bin2 = "SELECT (
								SELECT SUM( BinWeight ) 
								FROM Weights
								WHERE Yr =2018
								AND BinID = '$bin2'
								) AS bin2";
					  $binData1bin3 = "SELECT (
								SELECT SUM( BinWeight ) 
								FROM Weights
								WHERE Yr =2018
								AND BinID = '$bin3'
								) AS bin3";
								
					  $result1bin1 = mysqli_query($connection, $binData1bin1);//year bin1
					  $bin1Yr = mysqli_fetch_row($result1bin1);
					  $bin1V = $bin1Yr[0];
					  
					  $result1bin2 = mysqli_query($connection, $binData1bin2);//year bin2
					  $bin2Yr = mysqli_fetch_row($result1bin2);
					  $bin2V = $bin2Yr[0];
					  
					  $result1bin3 = mysqli_query($connection, $binData1bin3);//year bin3
					  $bin3Yr = mysqli_fetch_row($result1bin3);
					  $bin3V = $bin3Yr[0];
					  
					  $result2 = mysqli_query($connection, $binData);//year
					  $theYr = mysqli_fetch_row($result2);
					  $Year = $theYr[0];
					  
					  /*
					   $binIDquery = "SELECT Bin
									 FROM Bins
									 WHERE HouseID = '".$house."'";
									  
					  $fetchBinsID = mysqli_query($connection, $binIDquery);
					  $binIDArray = Array();
					  while($row = mysqli_fetch_array($fetchBinsID)){
						   $binIDArray[] = $row[0];
						}
					  */
					  					  
					$data3 = "var data3 = new google.visualization.DataTable();\n\r"
                      ."data3.addColumn('string', 'Year');\n\r"
                      ."data3.addColumn('number', 'Recycling');\n\r\n\r"
                      ."data3.addColumn('number', 'Trash');\n\r\n\r"
                      ."data3.addColumn('number', 'Greenwaste');\n\r\n\r"
					  ."data3.addRows([\n\r";
					  

                        //temp until more data is entered
                        $data3 = $data3." ['".$Year."', ".$bin1V.", ".$bin2V.", ".$bin3V."],\n\r";
						echo "\n\r";
						$data3 = $data3." ['2019', 0, 0, 0],\n\r";
						echo "\n\r";
						$data3 = $data3." ['2020', 0, 0, 0],\n\r";
						echo "\n\r";
						$data3 = $data3." ['2021', 0, 0, 0],\n\r";
						echo "\n\r";
                        $data3 = $data3."]);\n\r";
					
					/*End of Annual View*/
					//echo $data3;

				$storeArray = Array();
				mysqli_close($connection);
	?>
				 <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        <?php echo $data3; ?>

    
        var options3 = {
          chart: {
            title: 'Trash Tracker',
            subtitle: 'Yearly Trash View',
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

        var chart3 = new google.charts.Bar(document.getElementById('chart_div3'));
        chart3.draw(data3, google.charts.Bar.convertOptions(options3));
      }
	  
    </script>