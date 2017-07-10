<?php

	$post = App::getInstance()->getTable('Post')->find($_GET['id']);

	$form = new \Core\HTML\BootstrapForm($post);

	var_dump($post);
?>

<form method="post">
	
	<?= $form -> input('titre_article','titre de l\'article',[], 'titre_article'); ?>
	<?= $form -> input('contenu_article','contenu de l\'article', ['type' => 'textarea'], 'contenu_article'); ?>
	<button class="btn btn-primary">Sauvegarder</button>

</form>