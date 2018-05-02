<!-- ?php include "../DB/dbinfo.php"; ? CHANGE DB INFO BACK POST TESTING -->
<?php

	//NEED TO INPUT NEW DB CONNECTION TO RESIDENT TABLE IN AWS DB
    $DBservername = "reinvent-solutions-rds-instance-id.ck1gum76iw9m.us-west-2.rds.amazonaws.com";
    $DBusername = "reinvent";
    $DBpassword = "solutions";
    $DBname = "RESIDENT";
	//
			
			$connection = mysqli_connect($DBservername, $DBusername, $DBpassword);
            if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

            $database = mysqli_select_db($connection, $DBname);  
            if (mysqli_connect_errno()) echo "Failed to connect to selected db" . mysqli_connect_error();
	if($connection){
		
	if(isset($_POST['upload'])) {
    
	$file = $_FILES['file-upload']['tmp_name'];
	$count = 0;
	$weightCount = 0;
	$binCount = 0;
	$houseCount = 0;
	$userCount = 10000;
	$arrayCount = 0;
	// of rows
	$size = (is_numeric($_POST['number']) ? (int)$_POST['number'] : 0); //convert to number or 0 as default
	
	$ext = pathinfo($file, PATHINFO_EXTENSION);
	
	if($ext !== NULL){
		$handle = fopen($file, "r"); //open file
		$data = array();// data array
		
		while((($data = fgetcsv($handle, 10000, ",")) != FALSE) && $count < $size){
			//while we move to the next line (this keeps the html from lagging out
			
			//each coloumn
			$house = $data[0];
			$name = $data[1];
			$street = $data[2];
			$city = $data[3];
			$state = $data[4];
			$zip = $data[5];
			$dates = $data[6];
			$year = $data[7];
			$week = $data[8];
			$collectionWeek = $data[9];
			$route = $data[10];
			$bin = $data[11];
			$size = $data[12];
			$number = $data[13];
			$weight = $data[14];
			$estimate = $data[15];
			$impute = $data[16];
			$n1 =  $data[17];
			$n2 = $data[18];
			$n3 = $data[19];
			$n4 = $data[20];
			$n5 = $data[21];
			$condition = $data[22];
			
			
		   //Houses
		   $SQLquery = "SELECT DISTINCT House FROM Houses WHERE House = '$house'";
		    $q = mysqli_query($connection, $SQLquery)
			 Or die("<div><p>ERROR: Unable to execute query 1.</p>" . "<p>Error Code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p></div>");
			
			$row = mysqli_fetch_row($q);
            $houseNum = $row[0];

			//If return is null, create new house and insert data			
			if ($houseNum == NULL){
				//WHEN WE ADD A NEW HOUSE, INSERT NEW USER IN ADDTION TO HOUSE NUMBER & ATTACH
				//Users
				$q = "INSERT INTO Users (`ID`,`password`,`email`, `name`)
						VALUES ('$userCount', '$userCount', '$userCount', '$name')";
				
				$r = mysqli_query($connection, $q)
					Or die("<div><p>ERROR: Unable to execute query 2.</p>" . "<p>Error Code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p></div>");

				
				$q = "INSERT INTO Houses (`HouseKey`,`UsernameID`, `House`,`Address`,`St`,`City`,`Zip`,`N1`,`N2`,`N3`,`N4`,`N5`, `RouteNum`)
						VALUES('$houseCount','$userCount', '$house','$street','$state','$city','$zip', '$n1','$n2','$n3','$n4','$n5','$route')";
				$r = mysqli_query($connection, $q)
					Or die("<div><p>ERROR: Unable to execute query 3.</p>" . "<p>Error Code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p></div>");
				$houseCount++;
				$userCount++;
			}
			
		   //Bins
		   $SQLquery2 = "SELECT Bin FROM Bins, Houses WHERE (HouseID = House) AND House = '$house' AND BinType = '$bin'";
		    $t = mysqli_query($connection, $SQLquery2)
			 Or die("<div><p>ERROR: Unable to execute query 4.</p>" . "<p>Error Code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p></div>");
		    
			$row2 = mysqli_fetch_row($t);
            $binNum = $row2[0]; //database bin number
		   
		   //(IF)No bin, create new bin and attach house information
			if($binNum == NULL){
				$q2 = "INSERT INTO Bins (`Bin`, `HouseID`,`BinType`,`Number`,`Size`)
				   VALUES('$binCount','$house','$bin','$number','$size')";
				$u = mysqli_query($connection, $q2)
					Or die("<div><p>ERROR: Unable to execute query 5.</p>" . "<p>Error Code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p></div>");
				$binCount = $binCount + 1; //PSUDO AUTO-INCREMENT FOR BINS
			}
		   
		   //Weights
		   $SQLquery3 = "SELECT BinWeight FROM Weights, Bins, Houses WHERE (HouseID = House) AND (BinID = Bin) AND House = '$house' AND BinType = '$bin' AND Wk = '$week'";
		   $v = mysqli_query($connection, $SQLquery3)
			Or die("<div><p>ERROR: Unable to execute query 6.</p>" . "<p>Error Code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p></div>");
		   
			$row3 = mysqli_fetch_row($v);
            $weightNum = $row3[0]; //database weight number
		   
		   //(IF)No weight, create new weight and attach bin information
			if($weightNum == NULL){
				
				/* QUERY NEEDED TO FETCH SPECIFIC BINID USING HOUSE NUMBER --> BIN TYPE --> THE SPECIFIC BINID NEEDED
				TO INSERT WEIGHT VALUE INTO TABLE (USEFUL LATER)*/
				
				$qq3 = "SELECT Bin FROM Houses, Bins WHERE (HouseID = House) AND House = '$house' AND BinType = '$bin'";
				$xx = mysqli_query($connection, $qq3)
					Or die("<div><p>ERROR: Unable to execute query 7.</p>" . "<p>Error Code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p></div>");
				$row4 = mysqli_fetch_row($xx);
				$actualBinID = $row4[0];

				//Back to inserting into Weights table
				$q3 = "INSERT INTO Weights (`WeightID`, `BinID`,`BinWeight`,`Estimate`,`Wk`,`Yr`,`Dte`,`Impute`,`WeightDate`)
					VALUES ('$weightCount', '$actualBinID', '$weight','$estimate','$week','$year','$date','$impute','$dates')";
				$x = mysqli_query($connection, $q3)
					Or die("<div><p>ERROR: Unable to execute query 8.</p>" . "<p>Error Code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p></div>");   
				$weightCount = $weightCount + 1; // PSUDO AUTO-INCREMENT FOR WEIGHTS
			}
		   
		   //Route
		   $SQLquery4 = "SELECT RouteNumber FROM Routes WHERE RouteNumber = '$route'";
		   $y = mysqli_query($connection, $SQLquery4)
			Or die("<div><p>ERROR: Unable to execute query 9.</p>" . "<p>Error Code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p></div>");
		   $row5 = mysqli_fetch_row($y);
           $routeNum = $row5[0]; //database weight number
		   
		   //(IF) not in DB, insert
		   if($routeNum == NULL){
				$q4 = "INSERT INTO Routes (`RouteNumber`)
						VALUES ('$route')";
				$z = mysqli_query($connection, $q4)
				 Or die("<div><p>ERROR: Unable to execute query 10.</p>" . "<p>Error Code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p></div>");   
				 
				$data = array();// data array 
		   }
		   continue;
		   $count++;//9579
		}
		fclose($handle);
	  }
	 }
	}
	header("Location: upload.html");
?>