<?php

//Controleur chargé de s'occuper des articles
// Fait la jonction entre les modèles (ici les tables) et les vues

namespace App\Controller;
use Core\Controller\Controller;
use Core\Database\Database;
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


	/* Ajouter un commentaire */
	public function add(){		
		if(!empty($_POST)){

			$niveau_commentaire = $_POST['niveau_commentaire'] + 1;

	        
	         $commentateur = $this->Commentator->query('SELECT * FROM commentateur WHERE pseudo_commentateur ="'.$_POST['pseudo_commentateur'].'" AND email_commentateur="'.$_POST['email_commentateur'].'" ', null , true);
			 if($commentateur){
			  	$id_commentateur= $commentateur->id;		
			 }else{
			 	$last_id_commentateur = $this->Commentator->query('SELECT id FROM commentateur ORDER BY id DESC', null , true);
			  	$id_commentateur= $last_id_commentateur->id + 1;

			 	$resultCommentator = $this->Commentator->create($_GET['id'],[
					'pseudo_commentateur'=>$_POST['pseudo_commentateur'],
					'email_commentateur'=>$_POST['email_commentateur']

				]);
			 }

			 //var_dump($niveau_commentaire);
			 
			 $result = $this->Comment->create($_GET['id'],[
					'contenu_commentaire'=>$_POST['contenu_commentaire'],
					'id_commentateur'=>$id_commentateur,
					'niveau_commentaire'=>$niveau_commentaire,
					'id_article'=>$_POST['id_article'],
					'id_commentaire_parent'=>$_POST['parent_id']

				]);

			
			
			if($result){
				$article = $this->Post->findWithCategory($_POST['id_article']);
				$commentaire = $this->Comment->showComment($_POST['id_article']); 
				$message = ['succes'=>'Votre commentaires a bien été ajouté !'];

				$this->render('posts.show', compact('article','commentaire', 'message'));
			};
		}		

	}

	/* Signaler un commentaire */
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