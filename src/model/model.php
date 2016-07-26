
<?php
$conn = mysqli_connect('localhost', 'root', '', 'user') or die ('Không thể kết nối tới database');

		$sql = "INSERT INTO user (`name`, `pass`, `email`) VALUES ('trang', '111', 'trang123')";

		$result = mysqli_query($conn, $sql);

		if (!$result){
		    die ('Câu truy vấn bị sai');
		}

		mysqli_close($conn);
