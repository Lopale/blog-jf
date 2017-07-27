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
			SELECT commentaire.id as id_commentaire, commentaire.contenu_commentaire,commentaire.children, commentaire.id_commentateur, commentaire.modere_commentaire, commentaire.date_commentaire, commentaire.id_article, commentaire.id_commentaire_parent,commentaire.niveau_commentaire,commentaire.demande_moderation_comment, commentateur.pseudo_commentateur,commentateur.date_inscription
			FROM commentaire
			LEFT JOIN articles
					ON articles.id=commentaire.id_article
			LEFT JOIN commentateur
					ON commentaire.id_commentateur=commentateur.id
			WHERE articles.id = ?			
			ORDER BY commentaire.date_commentaire DESC",[$id]);


	}



	public function reportComment(){
		return $this->query("
				SELECT commentaire.id as id_commentaire, commentaire.contenu_commentaire, commentaire.id_commentateur, commentaire.modere_commentaire, commentaire.date_commentaire, commentaire.id_article, commentaire.id_commentaire_parent,commentaire.niveau_commentaire,commentaire.demande_moderation_comment, commentateur.pseudo_commentateur,commentateur.date_inscription
			FROM commentaire
			LEFT JOIN commentateur
					ON commentaire.id_commentateur=commentateur.id
			WHERE commentaire.demande_moderation_comment = 1",[$id]);
	}

	
}