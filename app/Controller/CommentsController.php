<?php

//Controleur chargé de s'occuper des articles
// Fait la jonction entre les modèles (ici les tables) et les vues

namespace App\Controller;
use Core\Controller\Controller;
use \App;

/**
* 
*/
class CommentsController extends AppController
{
	
	public function __construct(){
		parent::__construct(); // sert a appeler le constructeur parent
		$this->loadModel('Post');
		$this->loadModel('Category');
		$this->loadModel('Comment');
		$this->loadModel('Commentator');

	}



	public function add(){		
		if(!empty($_POST)){

			$niveau_commentaire = $_POST['niveau_commentaire'] + 1;

			$resultCommentator = $this->Commentator->create($_GET['id'],[
					'pseudo_commentateur'=>$_POST['pseudo_commentateur'],
					'email_commentateur'=>$_POST['email_commentateur']

				]);
			$result = $this->Comment->create($_GET['id'],[
					'contenu_commentaire'=>$_POST['contenu_commentaire'],
					'id_commentateur'=>'1', // A remplacer,
					'id_article'=>$_POST['id_article'],
					'niveau_commentaire' =>$niveau_commentaire,
					'id_commentaire_parent'=>$_POST['parent_id']

				]);
			if($result){
				$article = $this->Post->findWithCategory($_POST['id_article']);
				$commentaire = $this->Comment->showComment($_POST['id_article']); 

				$this->render('posts.show', compact('article','commentaire'));
			};
		}		

	}


	public function report(){


		if(!empty($_POST)){
			$result = $this->Comment->update($_POST['id_comment'],[
					'demande_moderation_comment'=>'1'
				]);
			if($result){
				$article = $this->Post->findWithCategory($_POST['id_article']);
				$commentaire = $this->Comment->showComment($_POST['id_article']); 

				$this->render('posts.show', compact('article','commentaire'));
			};
		}
	}

		
}