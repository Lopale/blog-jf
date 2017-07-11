<?php

	// La table a récupérer
	$postTable = App::getInstance()->getTable('Post');
	
	// Si des données sont passées en paramètres on les sauvegardes
	if(!empty($_POST)){
		$result = $postTable->update($_GET['id'],[
				'titre_article'=>$_POST['titre_article'],
				'contenu_article'=>$_POST['contenu_article']
			]);
		if($result){
			echo "<div class='alert alert-success'>L\'article a bien été modifié !</div>";
		};
	}

	// On récupère l'article sélectionné
	$post = $postTable->find($_GET['id']);

	// On envois les information via la table de création de formulaire
	$form = new \Core\HTML\BootstrapForm($post);
?>

<form method="post">
	
	<?= $form -> input('titre_article','titre de l\'article',[], 'titre_article'); ?>
	<?= $form -> input('contenu_article','contenu de l\'article', ['type' => 'textarea'], 'contenu_article'); ?>
	<button class="btn btn-primary">Sauvegarder</button>

</form>