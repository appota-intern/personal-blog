<?php 
	session_unset();
	setcookie("id",true,time()-1800);
	header('location: ../src/view/logout.php');
?>