<?php

	// La table a récupérer
	$table = App::getInstance()->getTable('Category');
	
	// Si des données sont passées en paramètres on les sauvegardes
	if(!empty($_POST)){
		$result = $table->create($_GET['id'],[
				'titre_categorie'=>$_POST['titre_categorie']
			]);
		if($result){
			header('Location:admin.php?pagetype=categories.index');
			echo "<div class='alert alert-success'>La catégorie a bien été ajouté !</div>";
		};
	}
	// On envois les information via la table de création de formulaire
	$form = new \Core\HTML\BootstrapForm($_POST);
?>

<form method="post">
	
	<?= $form -> input('titre_categorie','Titre de la catégorie',[], 'titre_categorie'); ?>	
	<button class="btn btn-primary">Sauvegarder</button>

</form>