<?php


namespace Core\HTML;

/**
* Class Form
* permet de générer un formulaire rapidement et simplement
*/
class Form
{
	
	/**
	*@var array données utilisées par le formulaire
	*/
	protected $data;
	
	/**
	*@var string tag permettant d'entourrer les balise avec la fonction surround
	*/
	public $surround = 'p'; 


	/**
	*Constructeur de la class
	*@param array $data : données utilisées par le formulaire
	*/	
	function __construct($data=array()) {
		$this->data = $data;
	}

	/**
	* Entourrer les balise avec un tag (par exemple <p>...</p>)
	*@param $html string : code HTLM à entourer
	*@return string
	*/
	protected function surround($html){
		return "<{$this->surround}>{$html}</{$this->surround}>";
	} 


	/**
	* Générer le placeholder des champs
	*@param $index string  : Index de la valeur à récupérer
	*@return string
	*/
	protected function getPlaceholder($index){
		if(is_object($this->data)){
			return $this->data->$index;
		}
		return isset($this->data[$index]) ? $this->data[$index] :null;
	}

	
	/**
	* Fonction construisant les champs input
	*@param $name string  
	*@param $label
	* @param array $options
	* @return string
	*
	*/
	public function input($name, $label, $options=[]){
		$type= isset($options['type']) ? $options['type']:'text';
		return $this->surround(
			'<label>'.$label.'</label>'.
			'<input type="'.$type.'" name="'.$name.'" value="'.$this->getPlaceholder($content).'" class="form-control">'
		);
	}

	/**
	* Fonction de crééation du bouton de validation du formulaire 
	*@return string
	*/
	public function submit(){
		return $this->surround('<button type="submit">Envoyer</button>');
	}


}