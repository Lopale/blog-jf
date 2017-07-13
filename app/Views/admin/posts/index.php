<?php

$datas = App::getInstance()->getTable ('Post')->last();

?>

<h1>ADMIN DU SITE : Articles</h1>

<p>
	<a href="?pagetype=posts.add" class="btn btn-success">Ajouter un Article</a>
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
		<?php foreach ($datas as $post): ?>
			<tr>
				<td><?= $post->id_article; ?></td>
				<td><?= $post->titre_article; ?></td>
				<td>
					<a class="btn btn-primary" href="?pagetype=posts.edit&id=<?= $post->id_article; ?>">Editer</a>
					<form action="?pagetype=posts.delete" method="post" style="display: inline;">
						<input type="hidden" name="id" value="<?= $post->id_article; ?>">
						<button type="submit" class="btn btn-danger">Supprimer</button>
					</form>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>