<?php
include_once "testdb.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
$error='';

if (isset($_POST['pay'])) {
	//$date  = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
	$date = date('Y-m-d');
	$end_date = date('Y-m-d', mktime(0, 0, 0, date("m")  , date("d") + 21, date("Y")));

	echo $end_date;
	
	$username=$_SESSION['login_user'];
	$book=$_SESSION['current_book'];

	// To protect MySQL injection for Security purpose
	$username = stripslashes($username);
	$book = stripslashes($book);
	
	$username = mysql_real_escape_string($username);
	$book = mysql_real_escape_string($book);
	
	
	$query = "SELECT idUser FROM users where username LIKE '$username'";
	$result = mysql_query($query) or die(mysql_error());
	
	while($row = mysql_fetch_array($result)){
		$idUser = $row[0];
		$query = "INSERT INTO reading(idUser, idBook, startdate, enddate) 
					VALUES($idUser, $book, '$date', '$end_date')";
		//echo $query;
		$result2 = mysql_query($query) or die(mysql_error());
		
		if($result2){
			$title = $_GET['title'];
			$author = $_GET['author'];
			$current_book = $_GET['current_book'];
			$link = $_GET['link_book'];
			//echo $title;
			//echo $author;
			//echo $current_book;
			header ("location: book.php?title=$title&author=$author&current_book=$current_book");
			//header ("location: $link");
		}
	}
	//echo $query;
	
	 
	mysql_close();
}
?>

