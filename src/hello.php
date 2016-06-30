<?php 
	require_once 'function.php';
	session_start();
	if($_SESSION['flag'] == true){
		echo '<h3>Hello: ' .$_SESSION['name']. '</h3>';
		echo '<a href="logout.php">Log out</a>';
	}else{
		if(!checkEmpty($_POST['username']) && !checkEmpty($_POST['userpass'])){	
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['flag'] = true;
		echo '<h3>Hello: ' .$_SESSION['name']. '</h3>';
		echo '<a href="logout.php">Log out</a>';
		}
		else{
			header('location: login.php');
		}
	}
?>