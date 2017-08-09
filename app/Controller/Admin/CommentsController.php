<?php
//Pour avoir un namespace spécifique à l'admin
//Controleur chargé de s'occuper des articles
// Fait la jonction entre les modèles (ici les tables) et les vues

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;

/**
* 
*/
class CommentsController extends AppController
{
	
	public function __construct(){
		parent::__construct();
		$this->loadModel('Comment');
	}

	public function index(){
		$comments = $this->Comment->reportComment();
		$this->render('admin.comments.index',compact('comments'));
	}







	public function moderate(){
		if(!empty($_POST)){
			$result = $this->Comment->update($_POST['id'],[
					'modere_commentaire'=>'1',
					'demande_moderation_comment'=>'0'
				]);
			if($result){
				return $this->index();
			};
		}
	}

	public function validate(){
		if(!empty($_POST)){
			$result = $this->Comment->update($_POST['id'],[
					'demande_moderation_comment'=>'0'
				]);
			if($result){
				return $this->index();
			};
		}
	}
}