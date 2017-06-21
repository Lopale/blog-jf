<?php

use \App\App;
use \App\Table\Article;
use \App\Table\Categorie;

$categorie = Categorie::find($_GET['id']);
if($categorie === false){
	App::notFound();
}

$article = Article::lastByCategorie($_GET['id']);

$categorie = Categorie::all();

?>

<div class="row">

	<!-- Colonne principale de Gauche -->
	<div class="col-sm-8">

		<h1><?php echo $categorie->titre_categorie; ?></h1>

		<?php
		// On liste tous les articles
		foreach ($article as $post) { 

			//var_dump($post);

			// Info direct de la BDD
			echo "<h2>".$post->titre_article."</h2>";
			echo "<em>ID : ".$post->id."<br/>Le : ".$post->date_article."</em>";
			echo "<p><b>".$post->titre_categorie."</b></p>";
			echo "<p>".$post->contenu_article."</p>";

			//Info générer par la class Article (App\Table)
			echo "<p>".$post->extrait."</p>";
			echo "<a href='".$post->url."'>Lire la suite</a>";

		}
?>
	</div>
	<!-- Fin Colonne principale de Gauche -->

	<!-- Colonne Categorie de Droite -->
	<div class="col-sm-4">
		<h3>Catégories</h3>
		<ul>
			<?php foreach(\App\Table\Categorie::all() as $categorie): ?>
				<li><a href="<?php echo $categorie->url; ?>"><?php echo $categorie->titre_categorie; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>

</div>
