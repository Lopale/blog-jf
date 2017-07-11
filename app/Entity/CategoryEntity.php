<?php

// Les Entité n'interagissent pas avec la base de données contrairement aux classes situées dans table

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