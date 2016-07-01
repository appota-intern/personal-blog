<?php
//session_start ();

require_once '../src/header.php';

if (isset ( $_GET ['action'] ) and $_GET ['action'] == 'logout') {
	setcookie("username",$_POST['username'],time()-1800);
	setcookie("flag",true,time()-1800);
	header ( 'location: /project-tt/demo5/public/index.php?action=login' );
	return;
}
if (isset ( $_GET ['action'] ) && $_GET ['action'] == 'login') {
	
	if (isset ( $_COOKIE['flag'] ) and $_COOKIE['flag'] == true) {
		header ( 'location: /project-tt/demo5/public/index.php' );
		return;
	}
	
	if (! empty ( $_POST ['username'] ) && ! empty ( $_POST ['userpass'] )) {
		$username = "trangnguyen";
		$password = "12345";
		if($_POST['username'] == $username and $_POST['userpass'] == $password){
			setcookie("username",$_POST['username'],time()+1800);
			setcookie("flag",true,time()+1800);
		//$_COOKIE['flag'] = true;
		
		header ( 'location: /project-tt/demo5/public/index.php' );
		return;
		}
	}
	require_once '../src/login.php';
} else {
	
	if (! isset ( $_COOKIE['flag'] ) or $_COOKIE['flag'] != true) {
		
		header ( 'location: /project-tt/demo5/public/index.php?action=login' );
		return;
	}
	require_once '../src/hello.php';
}

require_once '../src/footer.php';
	
	
	