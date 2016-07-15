<?php

require_once __DIR__ . '/../vendor/autoload.php';

$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
$base_uri = getenv('BASE_URI');

$base_uri_len = strlen($base_uri);
if ($base_uri_len and substr($uri, 0, $base_uri_len) == $base_uri) {
    $uri = substr($uri, $base_uri_len);
}


$user = new Controller\UserController();
session_start();
switch ($uri) {
    case '/login':
        $user->login();
        break;
    case '/logout':
        $user->logout();
        break;
    case '/':
        if (isset($_SESSION['flag']) and $_SESSION['flag'] == true) {
            $user->hello();
//            return;
        } else {
            $user->redirect('/login');
        }
        break;
    default:
        die('Page not found');
        break;
}
	// if(!empty($_COOKIE['id'])){
	// session_id($_COOKIE['id']);
	// }
	// session_start();
	// require_once '../src/view/header.php';
	// require_once '../src/controller/UserController.php';
	// $user = new UserControllers;


	// if (isset ( $_GET ['action'] ) and $_GET ['action'] == 'logout'){
	// 	$user->logout();
	// }
	// if (isset ( $_GET ['action'] ) && $_GET ['action'] == 'login') {
	// 	$user->login();
	// }

	// else {

	// 	if (! isset ( $_SESSION['flag'] ) or $_SESSION['flag'] != true) {

	// 		header ( 'location: /project-tt/public/index.php?action=login' );
	// 		return;
	// 	}

	// 	$user->hello();
	// }

	 



