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
					  
					  $lower = $_SESSION['GraphLow'];
					  $upper = $_SESSION['GraphUp'];
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
					   
					   /*Weekly View*/
					   $binData1 = "SELECT DISTINCT Wk
									FROM Weights
									WHERE (
									binID = '$bin1'
									OR binID = '$bin2'
									OR binID ='$bin3'
									)
									AND Wk > '$lower'
									AND Wk < '$upper'
									ORDER BY Wk ASC
									LIMIT 4";
					 
					  $binData2 = "SELECT BinWeight 
								   FROM Weights 
								   WHERE (binID ='$bin1' OR binID ='$bin2' OR binID ='$bin3') 
								   AND Wk > '$lower' AND Wk < '$upper' 
								   ORDER BY Wk, binID ASC
								   LIMIT 12";
					  
					  $result1 = mysqli_query($connection, $binData1);//weeks
					  $result2 = mysqli_query($connection, $binData2);//weights
					  
					   $data = "var data = new google.visualization.DataTable();\n\r"
                      ."data.addColumn('number', 'Week');\n\r"
                      ."data.addColumn('number', 'Recycling');\n\r\n\r"
                      ."data.addColumn('number', 'Trash');\n\r\n\r"
                      ."data.addColumn('number', 'Greenwaste');\n\r\n\r"
					  ."data.addRows([\n\r";
					  
					  $weightArray = Array();
					  while($row1 = mysqli_fetch_array($result2)){
						  $weightArray[] = $row1[0];
					  }
					  
					  
					  $counter = 0;
                      while($row2 = mysqli_fetch_array($result1)){
                        $week = $row2[0];
                        $data = $data." [".$week.", ".$weightArray[$counter].", ".$weightArray[$counter + 1].", ".$weightArray[$counter + 2]."],\n\r";
						echo "\n\r";
						$counter = $counter + 3;
                      }
                        $data = $data."]);\n\r";
					  /*End of Weekly View*/
				
				$binIDArray = array();
				$weightArray = array();
				$storeArray = array();
				mysqli_close($connection);
				?>
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
      }
	  
    </script>
	