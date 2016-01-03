<?php
include_once "testdb.php"; 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
if (isset($_POST['delete_user'])) {
	
	$id = $_POST['user_to_del'];

	// To protect MySQL injection for Security purpose
	$id = stripslashes($id);
	$id = mysql_real_escape_string($id);
	
	$query = "DELETE FROM users WHERE idUser=$id";
	$result = mysql_query($query) or die(mysql_error());
	
	mysql_close();
	
	header('location: profile.php');
}

?>