<?php

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
		$html = substr($this->contenu_article, 0, 150)."...";
		return $html;
	}
}