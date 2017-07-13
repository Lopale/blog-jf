<?php

$datas = App\App::getDb()->query('SELECT * FROM articles', 'App\Table\Article');

// On liste tous les articles
foreach ($datas as $auteur) { 

  // Info direct de la BDD
  echo "<h2>".$auteur->titre_article."</h2>";
  echo "<em>ID : ".$auteur->id."</em>";
  echo "<p>".$auteur->contenu_article."</p>";

  //Info générer par la class Article (App\Table)
  echo "<p>".$auteur->contenu_article."</p>";
  echo "<a href='".$auteur->url."'>Lire la suite</a>";

}

   
?>