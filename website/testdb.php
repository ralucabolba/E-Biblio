<?php

$hostname = "localhost";
$username = "root";
$password = "";

$databaseName = "libraryManagement";

$dbConnected = mysql_connect($hostname, $username, $password);

if(!$dbConnected){
    die('Fail to connect: ' . mysql_error());
}

//echo 'Connected succesfully';

$dbSelected = mysql_select_db($databaseName, $dbConnected);

?>