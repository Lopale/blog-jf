
<form method="post">
	
	<?= $form -> input('titre_article','Titre de l\'article',[], 'titre_article'); ?>	
	<?= $form -> select('categorie_id','Catégorie de l\'article', $categories); ?>
	<?= $form -> input('contenu_article','Contenu de l\'article',['type'=>'textarea'], 'contenu_article'); ?>
	<button class="btn btn-primary">Sauvegarder</button>

</form>