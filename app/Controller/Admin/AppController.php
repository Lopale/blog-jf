<?php

//Pour avoir un namespace spécifique à l'admin
namespace App\Controller\Admin;

use \App;
use \Core\Auth\DatabaseAuth;



/**
* 
*/
class AppController extends \App\Controller\AppController {

	public function __construct(){
		parent::__construct();

		// Authentification
		$app = App::getInstance();
		$auth = new DatabaseAuth($app->getDb());

		if(!$auth->logged()){
			$this->forbidden();
		}

	}

}