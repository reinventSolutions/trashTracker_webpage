<!-- 
    #######################################################
    FILENAME: monthlyGraph.php
    OVERVIEW: Displays Monthly
    PURPOSE: Pulls data on page load using sessions for 
	historicalComp.php monthly view 
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
					  
					  $minWeek= "SELECT DISTINCT (Wk) FROM Weights ORDER BY Wk ASC LIMIT 1";
					  $min = mysqli_query($connection, $minWeek);//Lowest Week
					  $minRow = mysqli_fetch_row($min);
					  $monthLow = $minRow[0];//1 for now
					  
					  
					  $numOfMonths = "SELECT DISTINCT (Wk) FROM Weights ORDER BY Wk DESC LIMIT 1";
					  $upperFloor = mysqli_query($connection, $numOfMonths);//HIGHEST MONTH AVAIL
					  $row = mysqli_fetch_row($upperFloor);
					  $monthUp2 = $row[0]; //should be 18
					  $monthUp = ceil($monthUp2/4); //ceil of this makes 18/4 = 5
					  $monthUp3 = $monthLow + 3;
					  				  
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
					  
					   $data2 = "var data2 = new google.visualization.DataTable();\n\r"
                      ."data2.addColumn('string', 'Month');\n\r"
                      ."data2.addColumn('number', 'Recycling');\n\r\n\r"
                      ."data2.addColumn('number', 'Trash');\n\r\n\r"
                      ."data2.addColumn('number', 'Greenwaste');\n\r\n\r"
					  ."data2.addRows([\n\r";
					
					  $q1 = "SELECT DISTINCT SUBSTRING_INDEX(WeightDate, '-', -2)
							FROM Weights
							WHERE Wk <= 16 
							AND Wk > 1";
							
					  $result1 = mysqli_query($connection, $q1);
					
                      while($row2 = mysqli_fetch_array($result1)){
                        $monthnum = $row2[0];					
						$bin1q = "SELECT (
								  SELECT SUM( BinWeight ) 
								  FROM Weights
								  WHERE WeightDate LIKE '%$monthnum'
								  AND BinID = '$bin1'
								  ) AS Bin1Mo";
						$binresult1 = mysqli_query($connection, $bin1q);
						$bin1s = mysqli_fetch_row($binresult1);
						$bin1sum = $bin1s[0];
						
						$bin2q = "SELECT (
								  SELECT SUM( BinWeight ) 
								  FROM Weights
								  WHERE WeightDate LIKE '%$monthnum'
								  AND BinID = '$bin2'
								  ) AS Bin2Mo";
								  
						$binresult2 = mysqli_query($connection, $bin2q);
						$bin2s = mysqli_fetch_row($binresult2);
						$bin2sum = $bin2s[0];
						
						$bin3q = "SELECT (
								  SELECT SUM( BinWeight ) 
								  FROM Weights
								  WHERE WeightDate LIKE '%$monthnum'
								  AND BinID = '$bin3'
								  ) AS Bin3Mo";
						$binresult3 = mysqli_query($connection, $bin3q);
						$bin3s = mysqli_fetch_row($binresult3);
						$bin3sum = $bin3s[0];
						
						switch($monthnum){
							case "Jan-18" :
							$monthnum = "January, 2018";
							break;
							case "Feb-18" :
							$monthnum = "February, 2018";
							break;
							case "Mar-18" :
							$monthnum = "March, 2018";
							break;
							case "Apr-18" :
							$monthnum = "April, 2018";
							break;
							case "May-18" :
							$monthnum = "May, 2018";
							break;
							case "Jun-18" :
							$monthnum = "June, 2018";
							break;
							case "Jul-18" :
							$monthnum = "July, 2018";
							break;
							case "Aug-18" :
							$monthnum = "August, 2018";
							break;
							case "Sep-18" :
							$monthnum = "September, 2018";
							break;
							case "Oct-18" :
							$monthnum = "October, 2018";
							break;
							case "Nov-18" :
							$monthnum = "November, 2018";
							break;
							case "Dec-18" :
							$monthnum = "December, 2018";
							break;
						}
						
                        $data2 = $data2." ['".$monthnum."', ".$bin1sum.", ".$bin2sum.", ".$bin3sum."],\n\r";
						echo "\n\r";
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