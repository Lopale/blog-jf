<?php

namespace App\Table;

use Core\Table\Table;

/**
* 
*/
class PostTable extends Table
{

	protected $table = "articles";

	/**
	 * Récupère les derniers articles
	 * @return array
	 */
	
	public function last(){
		return $this->query("
				SELECT articles.id as id_article, articles.titre_article, articles.date_article, articles.contenu_article, categories.id, categories.titre_categorie
				FROM articles
				LEFT JOIN categories
					ON categorie_id=categories.id
				ORDER BY articles.id DESC");
	}

	/**
	 * Récupère les derniers articles de la catégorie demandé
	 * @param $category_id int
	 * @return array
	 */
	
	public function lastByCategory($category_id){
		return $this->query("
				SELECT articles.id, articles.titre_article, articles.date_article, articles.contenu_article, categories.id, categories.titre_categorie
				FROM articles
				LEFT JOIN categories
					ON categorie_id=categories.id
				WHERE categories.id = ?
				ORDER BY articles.id DESC",[$category_id]);
	}


	/**
	 * Récupère un article en liant la catégorie associé
	 * @param $id int
	 * @return \App\Entity\PostEntity
	 */
	
	public function find($id){
		return $this->query("
				SELECT articles.id, articles.titre_article, articles.date_article, articles.contenu_article, categories.id, categories.titre_categorie
				FROM articles
				LEFT JOIN categories
					ON categorie_id=categories.id
				WHERE articles.id = ?",[$id], true);
	}


}