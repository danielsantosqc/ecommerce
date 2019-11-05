<?php 

require_once("vendor/autoload.php");
use \Slim\Slim;
use \Ecommerce\Page;
use \Ecommerce\PageAdmin;

$app = new Slim();

$app->config('debug', true);

// pagina ecommerce
$app->get('/', function() {
    
	$page->setTpl("index");
});

// pagina admin
$app->get('/admin', function() {
    
	$page = new PageAdmin();
	$page->setTpl("index");
});

$app->run();

 ?>