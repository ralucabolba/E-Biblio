<?php

include_once "testdb.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
$rerror='';

if (isset($_POST['register'])) {
	if (empty($_POST['username']) || empty($_POST['password'])
		|| empty($_POST['firstname']) || empty($_POST['lastname']) 
		|| empty($_POST['email'])) {
		$rerror = "You must fill all fields";
	}
	else{
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];

		// To protect MySQL injection for Security purpose
		$firstname = stripslashes($firstname);
		$lastname = stripslashes($lastname);
		$email = stripslashes($email);
		$username = stripslashes($username);
		$password = stripslashes($password);
		
		$firstname = mysql_real_escape_string($firstname);
		$lastname = mysql_real_escape_string($lastname);
		$email = mysql_real_escape_string($email);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		
		
		$query_test = mysql_query("SELECT idUser FROM users WHERE username = '$username'");
		
		echo $query_test;
		if(mysql_num_rows($query_test) > 0){
			$rerror = "Username already in database. Please choose another one.";
		}
		else{
			$query = "INSERT INTO users(firstname, lastname, email, username, passUser) VALUES ('$firstname', '$lastname', '$email', '$username', '$password')";
			$result = mysql_query($query);
			
			if($result){
				echo "Your account was created";
				$_SESSION['login_user']=$username; // Initializing Session
			}
			else{
				$rerror = "Invalid information";
			}
		}
		mysql_close();
	}
}
?>