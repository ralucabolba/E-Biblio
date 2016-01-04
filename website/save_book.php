<?php
include_once "testdb.php"; 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
if (isset($_POST['save_book'])) {
	
	$id = $_POST['title_save'];

	echo $id;
	// To protect MySQL injection for Security purpose
	$id = stripslashes($id);
	$id = mysql_real_escape_string($id);
	
	//$query = "DELETE FROM book WHERE idBook = $id";
	//$result = mysql_query($query) or die(mysql_error());
	
	//mysql_close();
	
	//header('location: profile.php');
}

?>