<?php

namespace Core\Controller;

/**
* 
*/
class Controller {

	protected $viewPath; // chemin de la vue
	protected $template;

	//Fonction qui génère la vue
	protected function render($view, $variables = []){
		ob_start();
		extract($variables);
		require ($this ->viewPath . str_replace('.', '/', $view) .'.php');
		$pageContent = ob_get_clean();
		require($this ->viewPath. 'template/'.$this->template.'.php');
	}



	protected static function notFound(){
		header("HTTP/1.0 404 Not Found");
		//header('Location:index.php?pagetype=error.404');
		die('404');
	}



	protected static function forbidden(){
		header("HTTP/1.0 403 Forbidden");
		//header('Location:index.php?pagetype=403');
		die('Acces Interdit');
	}



}