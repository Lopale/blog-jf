<?php

namespace App\Entity;

use Core\Entity\Entity;

class CategoryEntity extends Entity{
	


	/**
	* Générer les getteur
	**/

	public function getUrl(){
		return 'index.php?pagetype=posts.category&id='. $this->id;
	}
}