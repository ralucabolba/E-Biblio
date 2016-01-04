<?php

$hostname = "localhost";
$usernameDB = "root";
$password = "";

$databaseName = "libraryManagement";

$dbConnected = mysql_connect($hostname, $usernameDB, $password);

if(!$dbConnected){
    die('Fail to connect: ' . mysql_error());
}

//echo 'Connected succesfully';

$dbSelected = mysql_select_db($databaseName, $dbConnected);

?>