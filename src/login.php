<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Insert title here</title>
</head>
<body>
	<div class="content">
	<?php 
		session_start();
		if($_SESSION['flag']  == true){
	
			header('location: hello.php');
		}
		else{
	?>

		<form action="hello.php" method="post" name="index">
			Name: <input type="text" name="name" value=""/>
			<input type="submit" name="submit" value="Login"/>
		</form>
		
	}
		
	<?php 
		}
	?>
	</div>
</body>
</html>