<?php

// Les Entité n'interagissent pas avec la base de données contrairement aux classes situées dans table

namespace App\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity{
	


	/**
	* Générer les getteur
	**/

	public function getUrl(){
		return 'index.php?pagetype=posts.show&id='. $this->id_article;
	}

	public function getExtrait(){
		$html = substr($this->contenu_article, 0, 350)."...";
		return $html;
	}
}