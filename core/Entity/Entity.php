<?php

namespace Core\Entity;

/**
* 
*/
class Entity
{
	
	/* Générer automatiquement un getteur si celui-ci n'existe pas */
	public function __get($key){
		$methode ='get'.ucfirst($key);
		$this->$key = $this -> $methode();
		return $this -> $key;
	}

}