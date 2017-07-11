<?php

$datas = App::getInstance()->getTable ('Category')->all();

?>

<h1>ADMIN DU SITE : Categorie</h1>

<p>
	<a href="?pagetype=categories.add" class="btn btn-success">Ajouter une Categorie</a>
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
		<?php foreach ($datas as $category): ?>
			<tr>
				<td><?= $category->id; ?></td>
				<td><?= $category->titre_categorie; ?></td>
				<td>
					<a class="btn btn-primary" href="?pagetype=categories.edit&id=<?= $category->id; ?>">Editer</a>
					<form action="?pagetype=categories.delete" method="post" style="display: inline;">
						<input type="hidden" name="id" value="<?= $category->id; ?>">
						<button type="submit" class="btn btn-danger">Supprimer</button>
					</form>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>