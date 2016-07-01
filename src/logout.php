<?php 
	setcookie("username",$_POST['username'],time()-1800); 
	setcookie("flag",true,time()-1800);
	header('location: ../src/logout.php');
?>