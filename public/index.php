<?php
//session_start ();


if(!empty($_COOKIE['id'])){
	session_id($_COOKIE['id']);
	
}
session_start();
require_once '../src/header.php';



if (isset ( $_GET ['action'] ) and $_GET ['action'] == 'logout') {
	
	setcookie("flag",true,time()-1800);
	header ( 'location: /project-tt/demo5/public/index.php?action=login' );
	return;
}
if (isset ( $_GET ['action'] ) && $_GET ['action'] == 'login') {
	
	if (isset ( $_SESSION['flag'] ) and $_SESSION['flag'] == true) {
		header ( 'location: /project-tt/demo5/public/index.php' );
		return;
	}
	
	if (! empty ( $_POST ['username'] ) && ! empty ( $_POST ['userpass'] )) {
		$username = "trangnguyen";
		$password = "12345";
		if($_POST['username'] == $username and $_POST['userpass'] == $password){
			//setcookie()
			setcookie("id", session_id(), time() +1800);
			//session_start();
		
			//setcookie("username",$_POST['username'],time()+1800);
			//("flag",true,time()+1800);
			$_SESSION['flag'] = true;
			$_SESSION['username'] = $_POST['username'];
		
		header ( 'location: /project-tt/demo5/public/index.php' );
		return;
		}
		
	}
	require_once '../src/login.php';
} else {
	
	if (! isset ( $_SESSION['flag'] ) or $_SESSION['flag'] != true) {
		
		header ( 'location: /project-tt/demo5/public/index.php?action=login' );
		return;
	}
	
	require_once '../src/hello.php';
}

require_once '../src/footer.php';
	
	
	