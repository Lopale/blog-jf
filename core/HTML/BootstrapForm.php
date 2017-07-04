<?php

namespace Core\HTML;

/**
* 
*/
class BootstrapForm extends Form
{
	
	/**
	* Entourrer les balise avec un tag (par exemple <p>...</p>)
	*@param $html string : code HTLM à entourer
	*@return string
	*/
	protected function surround($html){
		return "<div class=\"form-group\">{$html}</div>";
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
			'<input type="'.$type.'" name="'.$name.'" placeholder="'.$this->getPlaceholder($label).'">'
		);
			

	}


	/**
	* Fonction de crééation du bouton de validation du formulaire 
	*@return string
	*/
	public function submit(){
		return $this->surround('<button type="submit" class="btn btn-primary">Envoyer</button>');
	}



}