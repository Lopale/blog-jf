<?php

	// La table a récupérer
	$category = App::getInstance()->getTable('Category');
	
	// Si des données sont passées en paramètres on les sauvegardes
	if(!empty($_POST)){
		$result = $category->delete($_POST['id']);
		if($result){
			header('Location:admin.php?pagetype=categories.index');
		};
	}