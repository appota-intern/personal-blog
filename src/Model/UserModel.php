<?php
// loi vi If your using an IDE, you must start your code at the very first line
namespace model;
	class UserModel{

		public function checkData($name, $pass){
		$conn = mysqli_connect('localhost', 'root', '', 'user') or die ('Không thể kết nối tới database');
 
		// Câu truy vấn
		$sql = "SELECT `name`, `pass`, `email` FROM `user`  WHERE `name` = '" .$name. "' AND `pass` = '" .$pass. "'";
		 
		// Thực hiện câu truy vấn, hàm này truyền hai tham số vào là biến kết nối và câu truy vấn
		$result = mysqli_query($conn, $sql);
		 
		// Nếu thực thi không được thì thông báo truy vấn bị sai
		if (!$result){
		    die ('Câu truy vấn bị sai');
		}
		 
		return $result;
		//return $row = mysqli_fetch_assoc($result);
		 
		 
		// Sau khi thực thi xong thì ngắt kết nối database
		mysqli_close($conn);

	}

	public function addMember($name, $pass, $email, $group_id){
		$conn = mysqli_connect('localhost', 'root', '', 'user') or die ('Không thể kết nối tới database');

		$sql = "INSERT INTO user (`name`, `pass`, `email`, `group_id`, `timestamp`) VALUES ('" .$name. "', '" .$pass. "', '" .$email. "', '" .$group_id. "', '".time()."')";
		if (!$sql){
		    die ('Câu truy vấn bị sai');
		}

		$result = mysqli_query($conn, $sql);

		
		return $result;
		mysqli_close($conn);
	}

	public function checkDLN($property){
		$conn = mysqli_connect('localhost', 'root', '', 'user') or die ('Không thể kết nối tới database');
		$sql = "SELECT `".$property."` FROM `user` WHERE `".$property."` = '" .$property. "'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_fetch_assoc($result) > 0){
			return true;
		}
		return false;

		mysqli_close($conn);
	}

}
