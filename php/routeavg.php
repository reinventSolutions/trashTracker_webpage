<!-- 
    #######################################################
    FILENAME: routeavg.php
    OVERVIEW: Neighborhood comparison
    PURPOSE: PHP page that gets database information 
	neighborhood comparison.
    #######################################################
-->
<?php include "../../DB/dbinfo.php"; ?>
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
					$week = $_SESSION['GraphUp'] - 1;

						//Get the Route Number
						$route = "SELECT RouteNum FROM Houses WHERE House = '$house'";
						$result = @mysqli_query($connection, $route);
						$row = mysqli_fetch_row($result);
						$routeNum = $row[0];

						//# of Houses in Count with that Route Number
						$getcount = "SELECT COUNT(House) FROM Houses WHERE RouteNum = '$routeNum'";
						$result1 = @mysqli_query($connection, $getcount);
						$row1 = mysqli_fetch_row($result1);
						$houseCount = $row1[0] - 1; //of other homes on same route
						$_SESSION['houseCount'] = $houseCount;

						//Route Average for all the Houses
						$routeAvg = "SELECT (SELECT SUM(BinWeight)
									FROM Houses, Weights, Bins
									WHERE (House = HouseID)
									AND (Bin = BinID)
									AND NOT (BinType =2 OR BinType =3)
									AND RouteNum = '$routeNum' AND Wk = '$week')
									/
									((SELECT SUM(BinWeight)
									FROM Houses, Weights, Bins
									WHERE (House = HouseID)
									AND (Bin = BinID)
									AND NOT (BinType = 3 Or BinType = 2)
									AND RouteNum = '$routeNum' AND Wk = '$week')
									+
									(SELECT SUM(BinWeight)
									FROM Houses, Weights, Bins
									WHERE (House = HouseID) AND (Bin = BinID)
									AND NOT (BinType =3 Or BinType = 1)
									AND RouteNum = '$routeNum' AND Wk = '$week'))";

						$result2 = @mysqli_query($connection, $routeAvg);
						$row2 = mysqli_fetch_row($result2);
						$routeTotalAverage = $row2[0] * 100; //Average of other homes on same route
					  	$routeTotalAverage= number_format($routeTotalAverage,0);	
						$_SESSION['routeAverage'] = $routeTotalAverage;

mysqli_close($connection);
?>
