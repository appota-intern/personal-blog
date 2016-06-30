<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" >
<link rel="stylesheet" href="../bootstrap/css/style.css" >
<title>Login</title>
</head>
<body>
<?php 
	session_start();
	if($_SESSION['flag'] == true){
		echo '<h3>Hello: ' .$_SESSION['name']. '</h3>';
		echo '<a href="logout.php">Log out</a>';
	}else{
		
?>
	<form class="form-inline" action="hello.php" method="post" >
		<div class="form-group">
			<label class="sr-only" for="exampleInputEmail3">Email address</label>
			<input type="text" name="username" class="form-control" id="exampleInputEmail3" placeholder="Username">
			
		</div>
		<div class="form-group">
			<label class="sr-only" for="exampleInputPassword3">Password</label> 
			<input type="password" name="userpass" class="form-control" id="exampleInputPassword3" placeholder="Password">
			
		</div>
		
		<button type="submit" class="btn btn-default">Login</button>
	</form>
<?php 
	}
?>
	<script type="text/javascript" src="../bootstrap/js/jquery-3.0.0.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>