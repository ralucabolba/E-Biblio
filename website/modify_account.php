<?php

include_once "testdb.php";
session_start();

$merror='';

$user_check=$_SESSION['login_user'];
if (isset($_POST['modify'])) {
	if (empty($_POST['username']) || empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email'])) {
		$merror = "You must fill all fields";
	}
	else{
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$email=$_POST['email'];
		$username=$_POST['username'];

		// To protect MySQL injection for Security purpose
		$firstname = stripslashes($firstname);
		$lastname = stripslashes($lastname);
		$email = stripslashes($email);
		$username = stripslashes($username);
		
		$firstname = mysql_real_escape_string($firstname);
		$lastname = mysql_real_escape_string($lastname);
		$email = mysql_real_escape_string($email);
		$username = mysql_real_escape_string($username);
		
		
		$query = "UPDATE users SET firstname='$firstname', lastName='$lastname', email='$email', username='$username' WHERE username='$user_check'";
		$result = mysql_query($query);
		
		if($result){
			echo "Your account was modified";
			$_SESSION['login_user']=$username; // Initializing Session
			header("location: profile.php");
		}
		else{
			$merror = "Invalid information";
		}
		
		mysql_close();
	}
}
?>