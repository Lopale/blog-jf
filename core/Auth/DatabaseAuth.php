<?php

namespace Core\Auth;

use Core\Database\Database;

/**
* 
*/
class DatabaseAuth
{

	private $db;


	public function __construct(Database $db){
		$this->db = $db;
	}

	public function getUserId(){
		if($this->logged()){
			return $_SESSION['auth'];
		}else{
			return false;
		}
		
	}
	
	
	/**
	 * @param $username
	 * @param $password
	 * @return boolean
	 */
	public function login($username, $password){
		$user = $this->db->prepare('SELECT * FROM users WHERE username =?',[$username], null , true);
		if($user){
		 	if($user->password === sha1($password)){
		 		$_SESSION['auth'] = $user->id_user;
		 		return true;
				//var_dump($user);
		 	}
		}
		return false;

		var_dump($user);
	}

	public function logged(){
		return isset($_SESSION['auth']);
	}

}