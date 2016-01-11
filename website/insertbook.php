<?php
include_once "testdb.php"; 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
if (isset($_POST['insert_book'])) {
	if (empty($_POST['new_title']) || empty($_POST['new_author'])
		|| empty($_POST['new_description']) || empty($_POST['new_publisher']) 
		|| empty($_POST['new_category']) || empty($_POST['new_cover']) || empty($_POST['new_rYear']) || empty($_POST['new_price']) || empty($_POST['new_location']) ) {
		echo "You must fill all fields";
	}
	else{
		$title = $_POST['new_title'];
		$author = $_POST['new_author'];
		$description = $_POST['new_description'];
		$publisher = $_POST['new_publisher'];
		$category = $_POST['new_category'];
		$cover = $_POST['new_cover'];
		$rYear = $_POST['new_rYear'];
		$price = $_POST['new_price'];
		$location = $_POST['new_location'];

		//echo $cover;
		// To protect MySQL injection for Security purpose
		//$id = stripslashes($id);
		//$id = mysql_real_escape_string($id);
		
		//echo $_POST['user_to_del'];
		$query = "INSERT INTO book(title, author, description, publisher, category, cover, rYear, grades, noGrades, price, location, idLibrary)
					VALUES('$title', '$author', '$description', '$publisher', '$category', CONCAT('img/','$cover'), $rYear, 0, 0, $price, '$location', 1)";
		$result = mysql_query($query) or die(mysql_error());
		
		mysql_close();
		
		header('location: profile.php');
	}
}

?>