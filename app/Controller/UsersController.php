<?php

namespace App\Controller;

use \Core\Auth\DatabaseAuth;
use \Core\HTML\BootstrapForm;
use \App;

/**
* 
*/
class UsersController extends AppController{
	
	/* Interface de connextion */
	public function login(){

		$errors = false;

		if(!empty($_POST)){
			$auth = new DatabaseAuth(App::getInstance()->getDb());
			if($auth -> login($_POST['username'], $_POST['password'])){
				header('Location:index.php?pagetype=admin.posts.index');
			}else{
				$errors = true;
			}
		}

		$form = new BootstrapForm($_POST);


		$this->render('users.login', compact('form','errors'));


	}


}