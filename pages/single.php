<?php

use \App\App;
use \App\Table\Article;
use \App\Table\Categorie;


$post = Article::find($_GET['id']);

if($post === false){
	App::notFound();
}

App::setTitle($post->titre_article);

$categorie = Categorie::find($post->categorie_id);




	echo "<h2>".$post->titre_article."</h2>";
	echo "<em>ID : ".$post->id."<br/>Le : ".$post->date_article."</em>";
	echo "<p><b>Categorie : ".$categorie->titre_categorie."</b></p>";
	echo "<p>".$post->contenu_article."</p>";

?>
<a href="index.php">Retour à l'accueil</a>