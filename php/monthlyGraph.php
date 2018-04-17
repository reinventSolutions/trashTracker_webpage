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
					  
					  if (isset($_POST['lowerValue']) && isset($_POST['upperValue'])){
						$lower = $_POST['lowerValue'];
						$upper = $_POST['upperValue'];
					  }		
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
					   $binData3 = "SELECT DISTINCT Wk
									FROM Weights
									WHERE (
									binID = '$bin1'
									OR binID = '$bin2'
									OR binID ='$bin3'
									)
									AND Wk > '$lower'
									AND Wk < '$upper'
									ORDER BY Wk DESC
									LIMIT 4";
					 
					  $binData4 = "SELECT BinWeight 
								   FROM Weights 
								   WHERE (binID ='$bin1' OR binID ='$bin2' OR binID ='$bin3') 
								   AND Wk > '$lower' AND Wk < '$upper' 
								   ORDER BY Wk DESC
								   LIMIT 12";
					  
					  $result3 = mysqli_query($connection, $binData3);//weeks
					  $result4 = mysqli_query($connection, $binData4);//weights
					  
					   $data2 = "var data2 = new google.visualization.DataTable();\n\r"
                      ."data2.addColumn('number', 'Month');\n\r"
                      ."data2.addColumn('number', 'Recycling');\n\r\n\r"
                      ."data2.addColumn('number', 'Trash');\n\r\n\r"
                      ."data2.addColumn('number', 'Greenwaste');\n\r\n\r"
					  ."data2.addRows([\n\r";
					  
					  $weightArray = Array();
					  while($row1 = mysqli_fetch_array($result4)){
						  $weightArray[] = $row1[0];
					  }
					  
					  
					  $counter = 0;
                      while($row2 = mysqli_fetch_array($result3)){
                        $week = $row2[0];
                        $data2 = $data2." [".$week.", ".$weightArray[$counter].", ".$weightArray[$counter + 1].", ".$weightArray[$counter + 2]."],\n\r";
						echo "\n\r";
						$counter = $counter + 3;
                      }
                        $data2 = $data2."]);\n\r";
				
				$binIDArray = array();
				$weightArray = array();
				$storeArray = array();
				
				?>
	  <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        <?php echo $data2; ?>
    
        var options2 = {
          chart: {
            title: 'Trash Tracker',
            subtitle: 'Monthly Trash View',
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

        var chart2 = new google.charts.Bar(document.getElementById('chart_div2'));
        chart2.draw(data2, google.charts.Bar.convertOptions(options2));       
      }
    </script>
	