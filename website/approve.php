<?php
include_once "testdb.php"; 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
if (isset($_POST['approve'])) {
	
	$id = $_POST['idreview'];

	// To protect MySQL injection for Security purpose
	$id = stripslashes($id);
	$id = mysql_real_escape_string($id);
	
	$query = "update review set approved = 1 where idReview = $id and approved = 0";
	$result = mysql_query($query) or die(mysql_error());
	
	mysql_close();
	
	header('location: profile.php');
}

?>