<?php

include_once "testdb.php";
session_start(); 
$error='';

if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";
	}
	else{
		$username=$_POST['username'];
		$password=$_POST['password'];

		// To protect MySQL injection for Security purpose
		$username = stripslashes($username);
		$password = stripslashes($password);
		
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		
		
		$query = "select * from users where passUser='$password' AND username='$username'";
		$result = mysql_query($query);
		
		//echo $query;
		
		$rows = mysql_num_rows($result);
		if ($rows == 1) {
			$_SESSION['login_user']=$username; // Initializing Session
			//header("location: index.php"); // Redirecting To Other Page
			
		} 
		else {
			$error = "Username or Password is invalid";
		}
		mysql_close();
	}
}
?>