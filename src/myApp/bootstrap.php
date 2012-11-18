<?php


error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', TRUE);

define('APPLICATION_NAME', "myApp");
define('APP', "myapp");
//define('APP_ROOT', __DIR__ );
//define('MYMED_ROOT', __DIR__ . '/../../current');
//define('MYMED_URL_ROOT', '../../');

require('PhpConsole.php');
PhpConsole::start();
function debug_r($obj) {
	debug(print_r($obj, true));
}



use myApp\routing\Router;

require 'autoload.php';
require __DIR__.'/../lib/autoload.php';

//require 'routing/Router.php';

session_start();

$uri =  isset( $_SERVER['SCRIPT_URL'] ) ? $_SERVER['SCRIPT_URL'] : '/'.APP;

if (strpos($uri, '/application') === 0 ){ //nasty but used for registration mails
	header('Location:'.substr($uri, strlen('/application')).(!empty($_SERVER['QUERY_STRING'])?'?'.$_SERVER['QUERY_STRING']:''));
	exit();
}
if (isset($_GET['registration']) && $_GET['registration'] == "ok" ) { //same as above
	header('Location:/'.APP.'/registerValidate?accessToken='.$_GET['accessToken']);
	exit();
}

$router = new Router;

$router->route($uri);


?>