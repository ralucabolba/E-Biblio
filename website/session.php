<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include_once "testdb.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Storing Session
$user_check=$_SESSION['login_user'];

$ses_sql=mysql_query("select username from users where username='$user_check'");
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];

if(!isset($login_session)){
	mysql_close($connection); // Closing Connection
	header('Location: index.php'); // Redirecting To Home Page
}

?>