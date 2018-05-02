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
					  
					  $minWeek= "SELECT DISTINCT (Wk) FROM Weights ORDER BY Wk ASC LIMIT 1";
					  $min = mysqli_query($connection, $minWeek);//Lowest Week
					  $minRow = mysqli_fetch_row($min);
					  $monthLow = $minRow[0];//3 for now
					  
					  
					  $numOfMonths = "SELECT DISTINCT (Wk) FROM Weights ORDER BY Wk DESC LIMIT 1";
					  $upperFloor = mysqli_query($connection, $numOfMonths);//HIGHEST MONTH AVAIL
					  $row = mysqli_fetch_row($upperFloor);
					  $monthUp2 = $row[0]; //should be 15
					  $monthUp = ceil($monthUp2/4); //ceil of this makes 15/4 = 4
					  $monthUp3 = $monthLow + 3;
					  
					  //$monthLow = 0;
					  
					  //BinID info
					  $binIDquery = "SELECT Bin
									 FROM Bins
									 WHERE HouseID = '".$house."'";
									  
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
									WHERE House ='".$house."')";
										   
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
									AND Wk >= '$monthLow'
									AND Wk <= '$monthUp3'
									ORDER BY Wk ASC";
									
					 //Gets all bin weights
					  $binData2 = "SELECT BinWeight 
								   FROM Weights 
								   WHERE (binID ='$bin1' OR binID ='$bin2' OR binID ='$bin3') 
								   AND Wk >= '$monthLow' AND Wk <= '$monthUp2' 
								   ORDER BY Wk, binID ASC";
					  
					  $result1 = mysqli_query($connection, $binData1);//months
					  $result2 = mysqli_query($connection, $binData2);//weights
					  
					   $data2 = "var data2 = new google.visualization.DataTable();\n\r"
                      ."data2.addColumn('string', 'Month');\n\r"
                      ."data2.addColumn('number', 'Recycling');\n\r\n\r"
                      ."data2.addColumn('number', 'Trash');\n\r\n\r"
                      ."data2.addColumn('number', 'Greenwaste');\n\r\n\r"
					  ."data2.addRows([\n\r";
					  
					  $weightArray = Array();
					  while($row1 = mysqli_fetch_array($result2)){
						  $weightArray[] = $row1[0];
					  }
					
					$counter = 0;
					$counter3 = 0;
					$weightArray2 = Array();
					while($counter3 < ($monthUp2 + 4)){
					$weightArray2[$counter3] = $weightArray[$counter] + $weightArray[$counter+3] + $weightArray[$counter+6] + $weightArray[$counter+9];
							$counter = $counter + 1;
							$counter3 = $counter3 + 1;
						if($counter % 3 == 0){
							$weightArray2[$counter3] = $weightArray[$counter] + $weightArray[$counter+3] + $weightArray[$counter+6] + $weightArray[$counter+9];
							$counter = $counter + 9;}
					}				  
					  				  
					  $counter2 = 0;
                      while($row2 = mysqli_fetch_array($result1)){
                        $monthnum = $row2[0] - 2;
						if($monthnum == 1){
							$monthnum = 'Jan';
						}
						if($monthnum == 2){
							$monthnum = 'Feb';
						}
						if($monthnum == 3){
							$monthnum = 'Mar';
						}
						if($monthnum == 4){
							$monthnum = 'Apr';
						}
						if($monthnum == 5){
							$monthnum = 'May';
						}
						if($monthnum == 6){
							$monthnum = 'Jun';
						}
						if($monthnum == 7){
							$monthnum = 'Jul';
						}
						if($monthnum == 8){
							$monthnum = 'Aug';
						}
						if($monthnum == 9){
							$monthnum = 'Sep';
						}
						if($monthnum == 10){
							$monthnum = 'Oct';
						}
						if($monthnum == 11){
							$monthnum = 'Nov';
						}
						if($monthnum == 12){
							$monthnum = 'Dec';
						}
						
                        $data2 = $data2." ['".$monthnum."', ".$weightArray2[$counter2].", ".$weightArray2[$counter2 + 1].", ".$weightArray2[$counter2 + 2]."],\n\r";
						echo "\n\r";
						$counter2 = $counter2 + 3;
                      }
                        $data2 = $data2."]);\n\r";
					  /*End of Weekly View*/
				
				$binIDArray = array();
				$weightArray = array();
				$weightArray2 = array();
				$storeArray = array();
				mysqli_close($connection);
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