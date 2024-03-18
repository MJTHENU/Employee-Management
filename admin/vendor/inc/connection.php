<?php

$servername = "localhost";
$dBUsername = "emp";
$dbPassword = "SIZl[)XXIf5B";
$dBName = "employee";

$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dBName);

if(!$conn){
	echo "Databese Connection Failed";
}

?>


