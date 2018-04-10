<?php
	session_start();
	$_SESSION["GraphLow"] = $_SESSION["GraphLow"] + 1; 
	$_SESSION["GraphUp"] = $_SESSION["GraphUp"] + 1;
	 header("Location: account.php");
?>