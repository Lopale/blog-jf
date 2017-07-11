<?php

use Core\Auth\DatabaseAuth;

define('ROOT', dirname(__DIR__));
require ROOT.'/app/App.php';
App::load();



if (isset($_GET['pagetype'])) {
	$page = $_GET['pagetype'];
}else{
	$page ='home';
}



// Authentification
$app = App::getInstance();
$auth = new DatabaseAuth($app->getDb());

if(!$auth->logged()){
	$app->forbidden();
}



ob_start();

if ($page === 'home') {
	require ROOT.'/pages/admin/posts/index.php';
}elseif($page === 'posts.edit'){
	require ROOT.'/pages/admin/posts/edit.php';
}elseif($page === 'posts.add'){
	require ROOT.'/pages/admin/posts/add.php';
}









$pageContent = ob_get_clean();

require ROOT.'/pages/template/default.php';