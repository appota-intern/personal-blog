<?php

namespace Controller;

abstract class BaseController {

    public function redirect($uri) {
        header('location:' . getenv('BASE_URI') . $uri);
    }

    public function loadView($view) {
    	$this->title = $view;
        require_once '../src/view/header.php';
        require_once '../src/view/' . $view . '.php';
        require_once '../src/view/footer.php';
        
    }


	public function checkData($username, $passwords){
		$conn = mysqli_connect('localhost', 'root', '', 'user') or die ('Không thể kết nối tới database');
 
		// Câu truy vấn
		$sql = "SELECT `name`, `pass`, `email` FROM `user`  WHERE `name` = '" .$username. "' AND `pass` = '" .$passwords. "'";
		 
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

	public function addMember($username, $password, $email, $group_id){
		$conn = mysqli_connect('localhost', 'root', '', 'user') or die ('Không thể kết nối tới database');

		$sql = "INSERT INTO user (`name`, `pass`, `email`, `group_id`, `timestamp`) VALUES ('" .$username. "', '" .$password. "', '" .$email. "', '" .$group_id. "', '".time()."')";
		if (!$sql){
		    die ('Câu truy vấn bị sai');
		}

		$result = mysqli_query($conn, $sql);

		
		return $result;
		mysqli_close($conn);
	}
}

?>