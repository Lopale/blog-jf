<?php
//Pour avoir un namespace spécifique à l'admin
//Controleur chargé de s'occuper des articles
// Fait la jonction entre les modèles (ici les tables) et les vues

namespace App\Controller\Admin;

use \Core\HTML\BootstrapForm;

/**
* 
*/
class CategoriesController extends AppController
{
	
	public function __construct(){
		parent::__construct();
		$this->loadModel('Category');
	}

	public function index(){
		$categories = $this->Category->all();
		$this->render('admin.categories.index',compact('categories'));
	}

	public function add(){		
		if(!empty($_POST)){
			$result = $this->Category->create($_GET['id'],[
					'titre_categorie'=>$_POST['titre_categorie']
				]);
			if($result){
				return $this->index();
			};
		}	




		// On envois les information via la table de création de formulaire
		$form = new BootstrapForm($category);

		$this->render('admin.categories.edit', compact('form'));

	}

	public function edit(){
		// Si des données sont passées en paramètres on les sauvegardes
		if(!empty($_POST)){
			$result = $this->Category->update($_GET['id'],[
					'titre_categorie'=>$_POST['titre_categorie']
				]);
			if($result){
				return $this->index();
			};
		}

		// On récupère l'article sélectionné
		$category = $this->Category->find($_GET['id']);


		// On envois les information via la table de création de formulaire
		$form = new BootstrapForm($category);

		var_dump($form);

		$this->render('admin.categories.edit', compact('form'));
	}

	public function delete(){
		
		// Si des données sont passées en paramètres on les sauvegardes
		if(!empty($_POST)){
			$result = $this->Category->delete($_POST['id']);
			if($result){
				return $this->index();
			};
		}
	}
}