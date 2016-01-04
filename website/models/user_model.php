<?php

include_once ("entities/user_entity.php");
//include_once "testdb.php";
		

class UserModel{
	function getUsers(){
		require "testdb.php";
		
		$query = "SELECT * FROM users WHERE idUser > 0";
		$result = mysql_query($query) or die(mysql_error());
		
		//echo $query;
		
		$users = array();
		
		while($row = mysql_fetch_array($result)){
			$idUser = $row[0];
			$firstname = $row[1];
			$lastname = $row[2];
			$email = $row[3];
			$usernam = $row[4];
			$password = $row[5];
			
			$user = new User($idUser, $firstname, $lastname, $email, $usernam, $password);
			
			array_push($users, $user);
		}
		mysql_close();
		return $users;
	}
	function getUserByUsername($username){
		require "testdb.php";
		
		$query = "SELECT * FROM users WHERE username LIKE '$username'";
		$result = mysql_query($query) or die(mysql_error());
		
		//echo $query;
		
		$idUser = "";
		$firstname = "";
		$lastname = "";
		$email = "";
		$usernam = "";
		$password = "";
		
		while($row = mysql_fetch_array($result)){
			$idUser = $row[0];
			$firstname = $row[1];
			$lastname = $row[2];
			$email = $row[3];
			$usernam = $row[4];
			$password = $row[5];
			
			$user = new User($idUser, $firstname, $lastname, $email, $usernam, $password);
			
			mysql_close();
			return $user;
		}
		mysql_close();
		return null;
	}
	
	function getUsernameById($idUser){
		require "testdb.php";
		
		$query = "SELECT username FROM users WHERE idUser = $idUser";
		$result = mysql_query($query) or die(mysql_error());
		
		while($row = mysql_fetch_array($result)){
			mysql_close();
			return $row[0];
		}
		
		
	}
}

?>