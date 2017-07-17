<?php
//Pour avoir un namespace spécifique à l'admin
//Controleur chargé de s'occuper des articles
// Fait la jonction entre les modèles (ici les tables) et les vues

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;

/**
* 
*/
class PostsController extends AppController
{
	
	public function __construct(){
		parent::__construct();
		$this->loadModel('Post');
	}

	public function index(){
		$posts = $this->Post->last();
		$this->render('admin.posts.index',compact('posts'));
	}

	public function add(){		
		if(!empty($_POST)){
			$result = $this->Post->create($_GET['id'],[
					'titre_article'=>$_POST['titre_article'],
					'contenu_article'=>$_POST['contenu_article'],
					'categorie_id'=>$_POST['categorie_id']
				]);
			if($result){
				return $this->index();
			};
		}	


		$this->loadModel('Category');
		// On récupère la catégorie de l'article
		$categories = $this->Category->extract('id','titre_categorie');

		// On envois les information via la table de création de formulaire
		$form = new BootstrapForm($_POST);

		$this->render('admin.posts.edit', compact('categories','form'));

	}

	public function edit(){
		// Si des données sont passées en paramètres on les sauvegardes
		if(!empty($_POST)){
			$result = $this->Post->update($_GET['id'],[
					'titre_article'=>$_POST['titre_article'],
					'contenu_article'=>$_POST['contenu_article'],
					'categorie_id'=>$_POST['categorie_id']
				]);
			if($result){
				return $this->index();
			};
		}

		// On récupère l'article sélectionné
		$post = $this->Post->findWithCategory($_GET['id']);

		$this->loadModel('Category');
		// On récupère la catégorie de l'article
		$categories =  $this->Category->extract('id','titre_categorie');

		// On envois les information via la table de création de formulaire
		$form = new BootstrapForm($post);

		$this->render('admin.posts.edit', compact('categories','form'));
	}

	public function delete(){
		
		// Si des données sont passées en paramètres on les sauvegardes
		if(!empty($_POST)){
			$result = $this->Post->delete($_POST['id']);
			if($result){
				return $this->index();
			};
		}
	}
}