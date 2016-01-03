<?php

include_once "testdb.php";
include_once "models/user_model.php";

$userModel = new UserModel();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
$reverror='';

if (isset($_POST['addreview'])) {
	if (empty($_POST['comment'])) {
		$reverror = "You must write your review";
	}
	else{
		$description=$_POST['comment'];
		echo $_SESSION['login_user'];
		$user = $userModel->getUserByUsername($_SESSION['login_user']);
		$idUser = $user->idUser;
		$idBook = $_SESSION['current_book'];
		

		// To protect MySQL injection for Security purpose
		$description = stripslashes($description);
		$description = mysql_real_escape_string($description);
		
		$idUser = stripslashes($idUser);
		$idUser = mysql_real_escape_string($idUser);
		
		$idBook = stripslashes($idBook);
		$idBook = mysql_real_escape_string($idBook);
		
		
		
		$query = "INSERT INTO review(description, approved, idUser, idBook) VALUES ('$description', 0, '$idUser', '$idBook')";
		$result = mysql_query($query);
		
		if($result){
			echo "Your review was saved";
		}
		else{
			$reverror = "Invalid information";
		}
		
		mysql_close();
	}
}
?>