<?php

include_once ("models/user_model.php");
include_once('modify_account.php');


class UserController{
	function getUsersTable(){
		$userModel = new UserModel();
		$users = $userModel->getUsers();

		$result = "<div style='height:400px;overflow:auto;'>
					<table class='tables'>
					  <thead>
						<tr>
						  <th>Id</th>
						  <th>First name</th>
						  <th>Last name</th>
						  <th>Email</th>
						  <th>Username</th>
						  <th>Remove</th>
						</tr>
					  </thead>
					  <tbody>";
						
		foreach($users as $user){
			$result = $result . "<tr>
						  <td>$user->idUser</td>
						  <td>$user->firstname</td>
						  <td>$user->lastname</td>
						  <td>$user->email</td>
						  <td>$user->username</td>
						  <td>
							<form action='' method='post'>
								<input type='hidden' name='user_to_del' value='$user->idUser' />
								<input type='submit' name='delete_user' value='' id='del_user'/>
							</form>
						  </td>
						</tr>";
		}
		
		$result = $result . "</tbody>
					</table>
					</div>";
		return $result;
	}
	function getUserTable($username){
		$userModel = new UserModel();
		$user = $userModel->getUserByUsername($username);
		
		$result = "";
		if($user){
					
			$result = "<div class = 'small-8 column userAccount'>
						<form action='' method='post'>
							<label>First name: 
								<input type='text' name = 'firstname' value='$user->firstname' />
							</label>
							
							<label>Last name: 
								<input type='text' name = 'lastname' value='$user->lastname' />
							</label>
							
							<label>Email: 
								<input type='text' name = 'email' value='$user->email' />
							</label>
							
							<label>Username: 
								<input type='text' name = 'username' value='$user->username' />
							</label>
							
							
							<input name='modify' type='submit' value=' Modify ' id='mod'>
							
						</form>	
					   </div>";
		}
        return $result;
	}
}
?>