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

	/* Affichage des commentaire*/
	public function index(){
		$comments = $this->Comment->reportComment();
		$this->render('admin.comments.index',compact('comments'));
	}


	/* demande de modération de commentaires */
	public function moderate(){
		if(!empty($_POST)){
			$result = $this->Comment->update($_POST['id_comment'],[
					'modere_commentaire'=>'1'
				]);
			if($result){
				return $this->index();
			};
		}
	}
}