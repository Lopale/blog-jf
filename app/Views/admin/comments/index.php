<h1>ADMIN DU SITE : Articles</h1>

<p>
	<a href="?pagetype=admin.posts.index" class="btn btn-success">Administrer les Article</a>

	<a href="?pagetype=admin.categories.index" class="btn btn-success">Administrer les categories</a>

</p>

<table class="table">

	<thead>
		<tr>
			<td>ID</td>
			<td>Auteur</td>
			<td>Commentaire</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($comments as $comment): ?>
			<tr>
				<td><?= $comment->id_commentaire; ?></td>
				<td><?= $comment->pseudo_commentateur; ?></td>
				<td><?= $comment->contenu_commentaire; ?></td>
				<td>					
					<form action="?pagetype=admin.posts.moderate" method="post" style="display: inline;" onsubmit="return confirm('Attention, vous êtes sur le point d\'effectuer une modération, voulez-vous continuer ?')">
						<input type="hidden" name="id" value="<?= $comment->id_commentaire; ?>">
						<button type="submit" class="btn btn-danger">Supprimer</button>
					</form>
					<a href="index.php?pagetype=posts.show&id=<?= $comment->id_article; ?>#comment_<?= $comment->id_commentaire; ?>" class="btn btn-info" target="_blank">Voir le contexte</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>