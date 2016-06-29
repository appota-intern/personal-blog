<?php 
	session_start();
		if($_SESSION['flag'] == true){
			header('location: ../src/hello.php');
		}else{
			header('location: ../src/login.php');
		}
	?>