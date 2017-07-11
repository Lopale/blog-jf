<?php

	// La table a récupérer
	$postTable = App::getInstance()->getTable('Post');
	
	// Si des données sont passées en paramètres on les sauvegardes
	if(!empty($_POST)){
		$result = $postTable->update($_GET['id'],[
				'titre_article'=>$_POST['titre_article'],
				'contenu_article'=>$_POST['contenu_article'],
				'categorie_id'=>$_POST['categorie_id']
			]);
		if($result){
			echo "<div class='alert alert-success'>L\'article a bien été modifié !</div>";
		};
	}

	// On récupère l'article sélectionné
	$post = $postTable->findWithCategory($_GET['id']);

	// On récupère la catégorie de l'article
	$categories = App::getInstance()->getTable('Category')->extract('id','titre_categorie');

	// On envois les information via la table de création de formulaire
	$form = new \Core\HTML\BootstrapForm($post);
?>

<form method="post">
	
	<?= $form -> input('titre_article','Titre de l\'article',[], 'titre_article'); ?>	
	<?= $form -> select('categorie_id','Catégorie de l\'article', $categories); ?>
	<?= $form -> input('contenu_article','Contenu de l\'article',['type'=>'textarea'], 'contenu_article'); ?>
	<button class="btn btn-primary">Sauvegarder</button>

</form>