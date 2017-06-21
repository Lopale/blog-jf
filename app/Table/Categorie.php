<?php

namespace  App\Table;

use App\App;

/**
* class Categorie
*/
class Categorie extends Table
{

	protected static $table ='categories';


	public function getUrl(){
		return 'index.php?pagetype=categorie&id='. $this->id;
	}



}