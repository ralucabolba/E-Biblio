<?php

class User{
	public $idUser;
	public $firstname;
	public $lastname;
	public $email;
	public $username;
	public $password;
	
	function __construct($idUser, $firstname, $lastname, $email, $username, $password){
		$this->idUser = $idUser;
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->email = $email;
		$this->username = $username;
		$this->password = $password;
	}
}
?>