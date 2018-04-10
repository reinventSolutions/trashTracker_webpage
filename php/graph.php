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
                  //echo "<p>Connected into database</p>";

              $database = mysqli_select_db($connection, $DBname);  
                if (mysqli_connect_errno()) echo "Failed to connect to selected db" . mysqli_connect_error();
                  else 
                      //echo "<p>Connected to the database now select table</p>";
					  
					  $house = $_SESSION['House'];
					  $lower = $_SESSION['GraphLow'];
					  $upper = $_SESSION['GraphUp'];
					  
					  
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
					  
					  
                      /*
					  $data = "var data = new google.visualization.DataTable();\n\r"
                      ."data.addColumn('number', 'Week');\n\r"
                      ."data.addColumn('number', 'Weight');\n\r\n\r"
                      ."data.addRows([\n\r";
					  */
					  
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
                
				
				
				//Print data to check if data from database is loaded
                echo $data;
				echo $lower;
				echo $upper;
				
				$weightArray = array();
				$storeArray = array();
        ?>