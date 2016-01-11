<?php

include_once "testdb.php";
include_once ("models/book_model.php");

$bookModel = new BookModel();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
$serror='';

if (isset($_POST['search'])) {
	if (!empty($_POST['tosearch'])) {
		$item = $_POST['tosearch'];
		
		//echo $item;

		// To protect MySQL injection for Security purpose
		$item = stripslashes($item);
		$item = mysql_real_escape_string($item);
		
		//$query = "SELECT * FROM book WHERE title LIKE '%$item%'";
		//echo $query;
		//$result = mysql_query($query);
		
		$book_array = array();
		$book_array = $bookModel->searchBook($item);
		
		if($book_array){
			$_SESSION['searched_item'] = $item;
			header("location: book_page.php");
		}
		else{
			if(isset($_SESSION['searched_item'])){
				unset ($_SESSION['searched_item']);
			}
			$serror = "No books found";
			header("location: book_page.php");
		}
	}
}
?>