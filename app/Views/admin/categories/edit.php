<?php

	// La table a récupérer
	$table = App::getInstance()->getTable('Category');
	
	// Si des données sont passées en paramètres on les sauvegardes
	if(!empty($_POST)){
		$result = $table->update($_GET['id'],[
				'titre_categorie'=>$_POST['titre_categorie']
			]);
		if($result){
			echo "<div class='alert alert-success'>La catégorie a bien été modifié !</div>";
		};
	}

	// On récupère la categorie sélectionné
	$categorie = $table->find($_GET['id']);

	// On envois les information via la table de création de formulaire
	$form = new \Core\HTML\BootstrapForm($categorie);
?>

<form method="post">
	
	<?= $form -> input('titre_categorie','Titre de la catégorie',[], 'titre_categorie'); ?>
	<button class="btn btn-primary">Sauvegarder</button>

</form>