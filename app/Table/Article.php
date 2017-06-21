<?php

namespace  App\Table;

use App\App;

/**
* class Article
*/
class Article extends Table
{

	public static function getLast(){
		return self::query("
				SELECT articles.id, articles.titre_article, articles.date_article, articles.contenu_article, categories.id, categories.titre_categorie
				FROM articles
				LEFT JOIN categories
					ON categorie_id=categories.id
				ORDER BY articles.id DESC");
	}


	public static function lastByCategorie($category_id){
		return self::query("
				SELECT articles.id, articles.titre_article, articles.date_article, articles.contenu_article, categories.id, categories.titre_categorie
				FROM articles
				LEFT JOIN categories
					ON categorie_id=categories.id
				WHERE categorie_id=?
				", [$category_id]);
	}

	/**
	* Générer les getteur
	**/

	public function getUrl(){
		return 'index.php?pagetype=article&id='. $this->id;
	}

	public function getExtrait(){
		$html = substr($this->contenu_article, 0, 150)."...";
		return $html;
	}

}