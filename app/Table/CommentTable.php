<?php

namespace App\Table;

use Core\Table\Table;

/**
* 
*/
class CommentTable extends Table
{
	protected $table = "commentaire";

	public function showComment($id){
		return $this->query("
			SELECT commentaire.id as id_commentaire, commentaire.contenu_commentaire, commentaire.id_commentateur, commentaire.modere_commentaire, commentaire.date_commentaire, commentaire.id_article, commentaire.id_commentaire_parent
			FROM commentaire
			LEFT JOIN articles
					ON articles.id=commentaire.id_article
			WHERE articles.id = ?",[$id]);
	}
	
}