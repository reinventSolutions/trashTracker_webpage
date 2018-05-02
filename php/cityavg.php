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
						$cityq = "SELECT City FROM Houses WHERE House = '$house'";
						$result = @mysqli_query($connection, $cityq);
						$row = mysqli_fetch_row($result);
						$city = $row[0];

						//# of Houses in Count with that Route Number
						$getcount = "SELECT COUNT(House) FROM Houses WHERE City = '".$city."'";
						$result1 = mysqli_query($connection, $getcount);
						$row1 = mysqli_fetch_row($result1);
						$cityCount = $row1[0] - 1; //of other homes on same route
						$_SESSION['cityCount'] = $cityCount;

						//Route Average for all the Houses
						$cityAvg = "SELECT (SELECT SUM(BinWeight)
									FROM Houses, Weights, Bins
									WHERE (House = HouseID)
									AND (Bin = BinID)
									AND NOT (BinType =2 OR BinType =3)
									AND City = '".$city."' AND Wk = '$week')
									/
									((SELECT SUM(BinWeight)
									FROM Houses, Weights, Bins
									WHERE (House = HouseID)
									AND (Bin = BinID)
									AND NOT (BinType = 3 Or BinType = 2)
									AND City = '".$city."' AND Wk = '$week')
									+
									(SELECT SUM(BinWeight)
									FROM Houses, Weights, Bins
									WHERE (House = HouseID) AND (Bin = BinID)
									AND NOT (BinType =3 Or BinType = 1)
									AND City = '".$city."' AND Wk = '$week'))";

						$result2 = @mysqli_query($connection, $cityAvg);
						$row2 = mysqli_fetch_row($result2);
						$cityTotalAverage = $row2[0] * 100; //Average of other homes on same route
						$cityTotalAverage = number_format($cityTotalAverage,0);

						$_SESSION['cityAverage'] = $cityTotalAverage;

mysqli_close($connection);
?>
