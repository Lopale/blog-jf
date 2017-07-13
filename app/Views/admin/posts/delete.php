<?php

	// La table a récupérer
	$postTable = App::getInstance()->getTable('Post');
	
	// Si des données sont passées en paramètres on les sauvegardes
	if(!empty($_POST)){
		$result = $postTable->delete($_POST['id']);
		if($result){
			header('Location:admin.php');
		};
	}