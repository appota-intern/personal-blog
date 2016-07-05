<?php 
	if(!empty($_COOKIE['id'])){
	session_id($_COOKIE['id']);
	}
	session_start();
	require_once '../src/view/header.php';
	require_once '../src/controller/UserController.php';
	$user = new UserControllers;
	
	
	if (isset ( $_GET ['action'] ) and $_GET ['action'] == 'logout'){
		$user->logout();
	}
	if (isset ( $_GET ['action'] ) && $_GET ['action'] == 'login') {
		$user->login();
	}
	
	else {
	
		if (! isset ( $_SESSION['flag'] ) or $_SESSION['flag'] != true) {
	
			header ( 'location: /project-tt/public/index.php?action=login' );
			return;
		}
	
		$user->hello();
	}
	
	require_once '../src/view/footer.php';
	
?>

