<?php

$app = App::getInstance();
$post = $app->getTable('Post')->find($_GET['id']);


if($post === false){
	$app->notFound();
}


$app->title = $post->titre_article;





	echo "<h2>".$post->titre_article."</h2>";
	echo "<em>ID : ".$post->id."<br/>Le : ".$post->date_article."</em>";
	echo "<p><b>Categorie : ".$post->titre_categorie."</b></p>";
	echo "<p>".$post->contenu_article."</p>";

?>
<a href="index.php">Retour à l'accueil</a>