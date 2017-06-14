<?php

require ('../app/Autoloader.php');
App\Autoloader::register();


/* Quelle Type de page est appelé */
if(isset($_GET['pagetype'])){
	$pagetype = $_GET['pagetype'];
}else{
	/* Si aucun type préciser, direction la page d'accueil */
	$pagetype = 'homepage';
}




ob_start(); // commence à stocker le contenu dans une variable

/* Appel du template de la page sélectionné */
if($pagetype==='homepage'){
	require ('../pages/home.php');
}elseif($pagetype==='homepage'){
	require ('../pages/single.php');
}

$pageContent = ob_get_clean(); // arrête de stocker le contenu dans une variable

require ('../pages/template/default.php');