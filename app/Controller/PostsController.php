<?php

//Controleur chargé de s'occuper des articles
// Fait la jonction entre les modèles (ici les tables) et les vues

namespace App\Controller;
use Core\Controller\Controller;
use \App;

/**
* 
*/
class PostsController extends AppController
{
	
	public function __construct(){
		parent::__construct(); // sert a appeler le constructeur parent
		$this->loadModel('Post');
		$this->loadModel('Category');
		$this->loadModel('Comment');

	}

	/* lister les article sur la page d'accueil */
	public function index(){
		$posts = $this->Post->last();
		$categories = $this->Category->all();
		//compact('posts','categories'); // génère tableau de variable
		$this->render('posts.index', compact('posts','categories'));
	}

	/* Récuper les article et catégories */
	public function category(){

		$categorie = $this->Category->find($_GET['id']);

		if($categorie === false){
			$this->notFound();
		}

		$articles =  $this->Post->lastByCategory($_GET['id']);

		$categories = $this->Category->all();

		$this->render('posts.category', compact('articles','categories', 'categorie'));
	}
	
	/* Afficher un article + ses commentaires */ 
	public function show(){
		$article = $this->Post->findWithCategory($_GET['id']);
		$commentaire = $this->Comment->showComment($_GET['id']); 

		// foreach ($commentaire as $comment) {
		// 	if($comment->modere_commentaire==1){
		// 		$comment->contenu_commentaire = "<b><i>Ce commentaire a été modéré par l'administrateur car il ne respecte pas la charte !</i></b>";
		// 	}
		// 	if($comment->demande_moderation_comment==1){
		// 		$comment->contenu_commentaire = "<i>Ce commentaire est en attente de modération !</i>";
		// 	}
  //           var_dump($comment->contenu_commentaire);
  //       }

		

		$this->render('posts.show', compact('article','commentaire'));


		//Appel du titre
	}

	
}