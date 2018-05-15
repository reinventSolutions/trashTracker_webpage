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
	
	$user = 10000;//10255 MAX#
	$week = 2;//1 and week 2
	$date = '2-Jan-18';//9-Jan-18 and 2-Jan-18
	
	if($connection){
		

		
		while($user <= 10255){
		//Select Bins for User
		$q = "SELECT Bin FROM Bins, Houses WHERE (House = HouseID) AND UsernameID = '$user'";
		$query = mysqli_query($connection, $q)
				 Or die("<div><p>ERROR: Unable to execute query 1.</p>" . "<p>Error Code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p></div>");
		
		$storeArray = Array();
		while($row = mysqli_fetch_array($query)){
			$storeArray[] = $row[0];
		}
		$bin1 = $storeArray[0];
		$bin2 = $storeArray[1];
		$bin3 = $storeArray[2];
		
		$insert = "INSERT INTO Weights (`BinID`,`BinWeight`,`Contamination`,`Estimate`,`Wk`,`Yr`,`Dte`,`Impute`,`WeightDate`)
					VALUES 
					('$bin1',0,0,0,'$week',2018,0,'0','".$date."'),
					('$bin2',0,0,0,'$week',2018,0,'0','".$date."'),
					('$bin3',0,0,0,'$week',2018,0,'0','".$date."');";
		$query2 = mysqli_query($connection, $insert)
				 Or die("<div><p>ERROR: Unable to execute query 2.</p>" . "<p>Error Code " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p></div>");

		$user = $user + 1;
		$storeArray = Array();
		}
	}
	header("Location: upload.html");
?>