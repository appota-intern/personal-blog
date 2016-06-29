<?php
session_start ();
if (isset ( $_POST ['submit'] )) {
	if (isset ( $_POST ['name'] ) && $_POST ['name'] != "") {
		$_SESSION['name'] = $_POST ['name'];
		$_SESSION['flag']  = true;
		
	}
}

echo "<p> Hello " . $_SESSION['name'] . "</p>";
?>