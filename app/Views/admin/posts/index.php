<h1>ADMIN DU SITE : Articles</h1>

<p>
	<a href="?pagetype=admin.posts.add" class="btn btn-success">Ajouter un Article</a>

	<a href="?pagetype=admin.categories.index" class="btn btn-success">Administrer les categories</a>

	<a href="?pagetype=admin.comments.index" class="btn btn-success">Administrer les commentaires Signalés</a>
</p>

<table class="table">

	<thead>
		<tr>
			<td>ID</td>
			<td>Titre</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($posts as $post): ?>
			<tr>
				<td><?= $post->id_article; ?></td>
				<td><?= $post->titre_article; ?></td>
				<td>
					<a class="btn btn-primary" href="?pagetype=admin.posts.edit&id=<?= $post->id_article; ?>">Editer</a>
					<form action="?pagetype=admin.posts.delete" method="post" style="display: inline;" onsubmit="return confirm('Attention, vous êtes sur le point d\'effectuer une suppression, voulez-vous continuer ?')">
						<input type="hidden" name="id" value="<?= $post->id_article; ?>">
						<button type="submit" class="btn btn-danger">Supprimer</button>
					</form>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>