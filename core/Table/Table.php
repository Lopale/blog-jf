<?php

namespace  Core\Table;

use Core\Database\Database;

/**
* 
*/
class Table
{

	protected $table;
	protected $db;

	public function __construct(Database $db){
		$this->db=$db;
		if(is_null($this->table)){
			$parts = explode('\\', get_class($this));
			$class_name = end($parts);
			$this->table = strtolower(str_replace('Table', '', $class_name)).'s';
		}
	}


	public function all(){
		return $this->query('SELECT * FROM '. $this->table);
	}

	public function find($id){
		return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
	}

	public function update($id, $fields){
		$sql_parts=[]; //On initialise un tableau vide pour contenir les champs de la requête
		$attributes = []; //On initialise un tableau vide pour contenir la valeur des champs de la requête
		foreach ($fields as $key => $value) {
			$sql_parts[] = "$key = ?";
			$attributes[] = $value;
		}
		$sql_part = implode(', ', $sql_parts); // on génère le morceau de requête concernant les champs + valeurs
		$attributes[] = $id; // On fini en passant l'id de la ligne à mettre à jour
		return $this->query("UPDATE {$this->table} SET $sql_part WHERE id = ?", $attributes, true);
	}

	public function extract($key, $value){ // créer un tableau pour les liste (par exemple le select des catégorie)
		$records = $this -> all();
		foreach ($records as $v) {
			$return[$v->$key] = $v->$value;
		}
		return $return;
	}

	public function query ($statement, $attributes=null,$one=false){
		if ($attributes) {
			return $this->db->prepare(
				$statement,
				$attributes,
				str_replace('Table', 'Entity', get_class($this)),
				$one
			);
		}else{
			return $this->db->query(
				$statement,
				str_replace('Table', 'Entity', get_class($this)),
				$one
			);
		}
	}



}