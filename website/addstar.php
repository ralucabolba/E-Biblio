<?php

include_once "testdb.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 


if (isset($_POST['star1']) || isset($_POST['star2']) || isset($_POST['star3']) || isset($_POST['star4']) || isset($_POST['star5'])) {

	echo "hahaha";
	
	$idBook = $_GET['current_book'];	
	$query = "UPDATE book SET noGrades = noGrades + 1 WHERE idBook = '$idBook'";
	$result = mysql_query($query) or die(mysql_error());
	
	if(isset($_POST['star1'])){
		$query = "UPDATE book SET grades = grades + 1 WHERE idBook = '$idBook'";
		$result = mysql_query($query) or die(mysql_error());
		
		echo "1 star";
	}
	
	if(isset($_POST['star2'])){
		$query = "UPDATE book SET grades = grades + 2 WHERE idBook = '$idBook'";
		$result = mysql_query($query) or die(mysql_error());
		
		echo "2 star";
	}	
	
	if(isset($_POST['star3'])){
		$query = "UPDATE book SET grades = grades + 3 WHERE idBook = '$idBook'";
		$result = mysql_query($query) or die(mysql_error());
		
		echo "3 star";
	}
	
	if(isset($_POST['star4'])){
		$query = "UPDATE book SET grades = grades + 4 WHERE idBook = '$idBook'";
		$result = mysql_query($query) or die(mysql_error());
		
		echo "4 star";
	}
	
	if(isset($_POST['star5'])){
		$query = "UPDATE book SET grades = grades + 5 WHERE idBook = '$idBook'";
		$result = mysql_query($query) or die(mysql_error());
		
		echo "5 star";
	}
	mysql_close();
}
?>