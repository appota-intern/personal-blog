<?php
// loi vi If your using an IDE, you must start your code at the very first line
namespace Model;
	class UserModel extends BaseModel{

		public function checkData($name, $pass){
	
			$sql = "SELECT `name`, `pass`, `email` FROM `user`  WHERE `name` = '" .$name. "' AND `pass` = '" .$pass. "'";
			$row = $this->query($sql, "select");
			return $row;

			if(!empty($this->checkDLN("name", $name))){

				$result = $this->checkPass($pass);
				if(password_verify($passwords, $result['pass'])){
					return true;
				}
				return false;
			}
		}
		

		public function addMember($name, $pass, $email, $group_id){
			
			$sql = "INSERT INTO user (`name`, `pass`, `email`, `group_id`,`timestamp`) VALUES ('" .$name. "', '" .$pass. "', '" .$email. "', '" .$group_id. "', '".time()."')";
			// var_dump($sql);
			// die();
			$row = $this->query($sql, "insert");
			return $row;
			
		}

		public function checkDLN($type, $value){
		
			$sql = "SELECT `".$type."` FROM `user` WHERE `".$type."` = '" .$value. "'";
			$row = $this->query($sql, "select");
			return $row;
		}

		public function checkPass($name){
			$sql = "SELECT `pass` FROM `user` WHERE `name` = '" .$name. "'";
			$row = $this->query($sql, "select");
			return $row;
		}

}
