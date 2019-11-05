<?php 
session_start();
require_once("vendor/autoload.php");
use \Slim\Slim;
use \Ecommerce\Page;
use \Ecommerce\PageAdmin;
use \Ecommerce\Model\User;

$app = new Slim();

$app->config('debug', true);

// pagina ecommerce
$app-> get('/', function() {
    
	$page->setTpl("index");
});

// pagina admin
$app-> get('/admin', function() {
     
    User::verifyLogin();
	$page = new PageAdmin();
	$page->setTpl("index");
});

// pagina login do admin
$app-> get('/admin/login', function(){

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);
	$page-> setTpl("login");
});


$app-> post("/admin/login", function(){

	User::login($_POST["login"],$_POST["password"]);
	header("Location: /admin");
	exit();
});


$app-> get('/admin/logout', function(){
	User::logout();
	header("Location: /admin/login");
	exit();
});


$app->run();

 ?>