<?php


	echo "<h2>".$article->titre_article."</h2>";
	echo "<em>ID : ".$article->id."<br/>Le : ".$article->date_article."</em>";
	echo "<p><b>Categorie : ".$article->titre_categorie."</b></p>";
	echo "<p>".$article->contenu_article."</p>";

?>
<a href="index.php" class='btn btn-info' >Retour à l'accueil</a>