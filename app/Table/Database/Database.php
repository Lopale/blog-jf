<?php

namespace App\Table\Database;

/**
* 
*/
class Database
{
	
	public function commentateurExist($username){
		$user = $this->db->prepare('SELECT * FROM users WHERE username =?',[$username], null , true);
		if($user){
		 	// if($user->password === sha1($password)){
		 	// 	$_SESSION['auth'] = $user->id_user;
		 	// 	return true;
				// //var_dump($user);
		 	// }
		 	var_dump($user);
		}
		return false;

		//var_dump($user);
	}
	
}