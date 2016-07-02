<?php 
	
	setcookie("flag",true,time()-1800);
	header('location: ../src/logout.php');
?>