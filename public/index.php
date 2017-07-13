<?php
define('ROOT', dirname(__DIR__));
require ROOT.'/app/App.php';
App::load();



if (isset($_GET['pagetype'])) {
	$page = $_GET['pagetype'];
}else{
	$page ='home';
}





if ($page === 'home') {
	$controller = new \App\Controller\PostsController();
	$controller -> index();
}elseif($page === 'posts.category'){
	$controller = new \App\Controller\PostsController();
	$controller -> category();
}elseif($page === 'posts.show'){
	$controller = new \App\Controller\PostsController();
	$controller -> show();
}elseif($page === 'login'){
	$controller = new \App\Controller\UsersController();
	$controller -> login();
}