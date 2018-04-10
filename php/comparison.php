<?php
//NORMAL COMP AVG
$neighborq = "SELECT N1, N2, N3, N4, N5 FROM Houses WHERE House = '$house'";
$fetchneighbor = mysqli_query ($connection, $neighborq);    
 while ($query_data = mysqli_fetch_row($fetchneighbor)){
    $N1ID = (int)$query_data[0];
    $N2ID = (int)$query_data[1];
    $N3ID = (int)$query_data[2];
    $N4ID = (int)$query_data[3];
    $N5ID = (int)$query_data[4];

    $_SESSION["N1"] = $N1ID; 
    $_SESSION["N2"] = $N2ID; 
    $_SESSION["N3"] = $N3ID; 
    $_SESSION["N4"] = $N4ID; 
    $_SESSION["N5"] = $N5ID; 
 }
 
 $comparison = "SELECT (
                  SELECT SUM( BinWeight ) 
                  FROM Weights
                  WHERE (
                        Wk = ( 
                              SELECT Wk
                              FROM Weights
                              ORDER BY Wk DESC 
                              LIMIT 1 ) 
                        AND BinID = '$bin1'
                        )
                      ) / 
                      ( 
                  SELECT SUM( BinWeight ) 
                  FROM Weights
                  WHERE (
                        Wk = ( 
                              SELECT Wk
                              FROM Weights
                              ORDER BY Wk DESC 
                              LIMIT 1 ) 
                        AND BinID = '$bin1' ) 
                        OR (
                            Wk = ( 
                                  SELECT Wk
                                  FROM Weights
                                  ORDER BY Wk DESC 
                                  LIMIT 1 ) 
                            AND BinID = '$bin2'
                            ) 
                        )AS Comparison"; 

    $housecomp = mysqli_query($connection, $comparison);
    $housecomprow = mysqli_fetch_row($housecomp);
    $housecomparison = $housecomprow[0];
    $housecompare = $housecomparison*100;

    $_SESSION["HouseCompare"] = $housecompare;


          $getN5Bins = "SELECT Bin
                      FROM Bins
                      WHERE HouseID = ( 
                        SELECT House
                        FROM Houses
                        WHERE House ='$N5ID')";
                              
           $fetchN5Bins = mysqli_query($connection, $getN5Bins);
           $n5BinArray = Array();
           while($row = mysqli_fetch_array($fetchN5Bins)){
               $n5BinArray[] = $row[0];
           }
          
           $n5Bin1 = $n5BinArray[0];
           $n5Bin2 = $n5BinArray[1];



$getN5Value = "SELECT (

SELECT SUM( BinWeight ) 
FROM Weights
WHERE (
Wk = ( 
SELECT Wk
FROM Weights
ORDER BY Wk DESC 
LIMIT 1 ) 
AND BinID = '$n5Bin1'
)
) / ( 
SELECT SUM( BinWeight ) 
FROM Weights
WHERE (
Wk = ( 
SELECT Wk
FROM Weights
ORDER BY Wk DESC 
LIMIT 1 ) 
AND BinID ='$n5Bin1' ) 
OR (
Wk = ( 
SELECT Wk
FROM Weights
ORDER BY Wk DESC 
LIMIT 1 ) 
AND BinID = '$n5Bin2'
)
)AS Comparison";       

$n5comp = mysqli_query($connection, $getN5Value);
   $n5comprow = mysqli_fetch_row($n5comp);
   $n5comparison = $n5comprow[0];

   $_SESSION["N5Compare"] = $n5comparison;            

$getN4Bins = "SELECT Bin
                      FROM Bins
                      WHERE HouseID = ( 
                        SELECT House
                        FROM Houses
                        WHERE House ='$N4ID')";
                              
           $fetchN4Bins = mysqli_query($connection, $getN4Bins);
           $n4BinArray = Array();
           while($row = mysqli_fetch_array($fetchN4Bins)){
               $n4BinArray[] = $row[0];
           }
          
           $n4Bin1 = $n4BinArray[0];
           $n4Bin2 = $n4BinArray[1];


$getN4Value = "SELECT (

SELECT SUM( BinWeight ) 
FROM Weights
WHERE (
Wk = ( 
SELECT Wk
FROM Weights
ORDER BY Wk DESC 
LIMIT 1 ) 
AND BinID = '$n4Bin1'
)
) / ( 
SELECT SUM( BinWeight ) 
FROM Weights
WHERE (
Wk = ( 
SELECT Wk
FROM Weights
ORDER BY Wk DESC 
LIMIT 1 ) 
AND BinID ='$n4Bin1' ) 
OR (
Wk = ( 
SELECT Wk
FROM Weights
ORDER BY Wk DESC 
LIMIT 1 ) 
AND BinID = '$n4Bin2'
)
)AS Comparison"; 

$n4comp = mysqli_query($connection, $getN4Value);
   $n4comprow = mysqli_fetch_row($n4comp);
   $n4comparison = $n4comprow[0];

   $_SESSION["N4Compare"] = $n4comparison;


$getN3Bins = "SELECT Bin
                      FROM Bins
                      WHERE HouseID = ( 
                        SELECT House
                        FROM Houses
                        WHERE House ='$N3ID')";
                              
           $fetchN3Bins = mysqli_query($connection, $getN3Bins);
           $n3BinArray = Array();
           while($row = mysqli_fetch_array($fetchN3Bins)){
               $n3BinArray[] = $row[0];
           }
          
           $n3Bin1 = $n3BinArray[0];
           $n3Bin2 = $n3BinArray[1];

$getN3Value = "SELECT (

SELECT SUM( BinWeight ) 
FROM Weights
WHERE (
Wk = ( 
SELECT Wk
FROM Weights
ORDER BY Wk DESC 
LIMIT 1 ) 
AND BinID = '$n3Bin1'
)
) / ( 
SELECT SUM( BinWeight ) 
FROM Weights
WHERE (
Wk = ( 
SELECT Wk
FROM Weights
ORDER BY Wk DESC 
LIMIT 1 ) 
AND BinID ='$n3Bin1' ) 
OR (
Wk = ( 
SELECT Wk
FROM Weights
ORDER BY Wk DESC 
LIMIT 1 ) 
AND BinID = '$n3Bin2'
)
)AS Comparison"; 

    $n3comp = mysqli_query($connection, $getN3Value);
    $n3comprow = mysqli_fetch_row($n3comp);
    $n3comparison = $n3comprow[0];
    $_SESSION["N3Compare"] = $n3comparison;


$getN2Bins = "SELECT Bin
                      FROM Bins
                      WHERE HouseID = ( 
                        SELECT House
                        FROM Houses
                        WHERE House ='$N2ID')";
                              
           $fetchN2Bins = mysqli_query($connection, $getN2Bins);
           $n2BinArray = Array();
           while($row = mysqli_fetch_array($fetchN2Bins)){
               $n2BinArray[] = $row[0];
           }
          
           $n2Bin1 = $n2BinArray[0];
           $n2Bin2 = $n2BinArray[1];

$getN2Value = "SELECT (

SELECT SUM( BinWeight ) 
FROM Weights
WHERE (
Wk = ( 
SELECT Wk
FROM Weights
ORDER BY Wk DESC 
LIMIT 1 ) 
AND BinID = '$n2Bin1'
)
) / ( 
SELECT SUM( BinWeight ) 
FROM Weights
WHERE (
Wk = ( 
SELECT Wk
FROM Weights
ORDER BY Wk DESC 
LIMIT 1 ) 
AND BinID ='$n2Bin1' ) 
OR (
Wk = ( 
SELECT Wk
FROM Weights
ORDER BY Wk DESC 
LIMIT 1 ) 
AND BinID = '$n2Bin2'
)
)AS Comparison"; 

$n2comp = mysqli_query($connection, $getN2Value);
   $n2comprow = mysqli_fetch_row($n2comp);
   $n2comparison = $n2comprow[0];

   $_SESSION["N2Compare"] = $n2comparison;


$getN1Bins = "SELECT Bin
                      FROM Bins
                      WHERE HouseID = ( 
                        SELECT House
                        FROM Houses
                        WHERE House ='$N1ID')";
                              
           $fetchN1Bins = mysqli_query($connection, $getN1Bins);
           $n1BinArray = Array();
           while($row = mysqli_fetch_array($fetchN1Bins)){
               $n1BinArray[] = $row[0];
           }
          
           $n1Bin1 = $n1BinArray[0];
           $n1Bin2 = $n1BinArray[1];

$getN1Value = "SELECT (

SELECT SUM( BinWeight ) 
FROM Weights
WHERE (
Wk = ( 
SELECT Wk
FROM Weights
ORDER BY Wk DESC 
LIMIT 1 ) 
AND BinID = '$n1Bin1'
)
) / ( 
SELECT SUM( BinWeight ) 
FROM Weights
WHERE (
Wk = ( 
SELECT Wk
FROM Weights
ORDER BY Wk DESC 
LIMIT 1 ) 
AND BinID ='$n1Bin1' ) 
OR (
Wk = ( 
SELECT Wk
FROM Weights
ORDER BY Wk DESC 
LIMIT 1 ) 
AND BinID = '$n1Bin2'
)
)AS Comparison"; 

   $n1comp = mysqli_query($connection, $getN1Value);
   $n1comprow = mysqli_fetch_row($n1comp);
   $n1comparison = $n1comprow[0];
   
   $neighborcomparison = (($n1comparison +  $n2comparison +  $n3comparison + $n4comparison + $n5comparison)/5) *100;
   $_SESSION["NCompare"] = $neighborcomparison;
   $_SESSION["N1Compare"] = $n1comparison; 
?>