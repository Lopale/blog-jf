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


	public function index(){
		$posts = $this->Post->last();
		$categories = $this->Category->all();
		//compact('posts','categories'); // génère tableau de variable
		$this->render('posts.index', compact('posts','categories'));
	}

	
	public function category(){

		$categorie = $this->Category->find($_GET['id']);

		if($categorie === false){
			$this->notFound();
		}

		$articles =  $this->Post->lastByCategory($_GET['id']);

		$categories = $this->Category->all();

		$this->render('posts.category', compact('articles','categories', 'categorie'));
	}
	

	public function show(){
		$article = $this->Post->findWithCategory($_GET['id']);
		$commentaire = $this->Comment->showComment($_GET['id']); // Il fait une bouccle sur TOUT les articles

		$this->render('posts.show', compact('article','commentaire'));


		//Appel du titre
	}

	
}