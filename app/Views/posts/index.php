<div class="row">

	<!-- Colonne principale de Gauche -->
	<div class="col-sm-8">
		<?php
		// On liste tous les articles
		foreach ($posts as $post) { 

			//var_dump($post);

			// Info direct de la BDD
			echo "<div class='postArticle'>";
			echo "<h2>".$post->titre_article."</h2>";
			echo "<em>ID : ".$post->id_article."<br/>Le : ".$post->date_article."</em>";
			echo "<p><b>".$post->titre_categorie."</b></p>";
			//echo "<p>".$post->contenu_article."</p>";

			//Info générer par la class Article (App\Table)
			echo "<p>".$post->extrait."</p>";
			echo "<a href='".$post->url."'>Lire la suite</a>";
			echo "</div>";

		}
?>

	<div class="paginator"></div>

	</div>
	<!-- Fin Colonne principale de Gauche -->

	<!-- Colonne Categorie de Droite -->
	<div class="col-sm-4">
		<h3>Catégories</h3>
		<ul>
			<?php foreach($categories as $categorie): ?>
				<li><a href="<?php echo $categorie->url; ?>"><?php echo $categorie->titre_categorie; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>

</div>
