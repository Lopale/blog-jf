<?php

namespace Core\Database;

use\PDO;

/**
 * Class Database 
 */
class MysqlDatabase extends Database {

	//Déclaration des variables
	private $db_name;
	private $db_user;
	private $db_pass;
	private $db_host;
	private $pdo;

	//Le constructeur
	public function __contstruct($db_name,$db_user="forteroche",$db_pass="nDoc817%",$db_host="localhost"){
		$this-> $db_name = $db_name;
		$this-> $db_user = $db_user;
		$this-> $db_pass = $db_pass;
		$this-> $db_host = $db_host;		
	}

	//Création du PDO
	private function getPDO(){
		if($this->pdo===null){ //évite d'initialiser plusieurs fois PDO
			// connexion BDD
			$pdo = new \PDO('mysql:host=localhost;dbname=openclassrooms_p3', 'forteroche', 'nDoc817%');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // On émet une alerte à chaque fois qu'une requête a échoué.
			$this->pdo = $pdo;
		}
		return $this->pdo;
	}


	public function query($statement, $class_name="null", $one=false){
		$req = $this->getPDO()->query($statement); // La requête
		if(
			// $statement commence par UPADATE, INSERT, DELETE
			strpos($statement, 'UPDATE') === 0 ||
			strpos($statement, 'INSERT') === 0 ||
			strpos($statement, 'DELETE') === 0 
		){
			return $req; // On a pas besoin de faire un FETCHALL
		}

		if ($class_name === null) {
			$req->setFetchMode(PDO::FETCH_OBJ);
		}else{
			$req->setFetchMode(PDO::FETCH_CLASS,$class_name);
		}
		
		if($one){
			$datas = $req->fetch();
		}else{
			$datas = $req->fetchAll();
		}
		return $datas;
	}

	public function prepare($statement, $attributes, $class_name="null", $one=false){
		$req = $this->getPDO()->prepare($statement);
		$res = $req->execute($attributes);

		if(
			// $statement commence par UPADATE, INSERT, DELETE
			strpos($statement, 'UPDATE') === 0 ||
			strpos($statement, 'INSERT') === 0 ||
			strpos($statement, 'DELETE') === 0 
		){
			return $res; // On a pas besoin de faire un FETCHALL
		}

		if ($class_name === null) {
			$req->setFetchMode(PDO::FETCH_OBJ);
		}else{
			$req->setFetchMode(PDO::FETCH_CLASS,$class_name);
		}

		if($one){
			$datas  = $req->fetch();
		}else{
			$datas  = $req->fetchAll();
		}
		
		return $datas;
	}


}