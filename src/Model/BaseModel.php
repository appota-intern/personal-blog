<?php
namespace Model;
require_once "../src/config.php";
	class BaseModel{
		// private $hostname = "localhost";
		// private $userhost = "root";
		// private $password = "";
		// private $dbname   = "user";


		public function query($sql, $type){
			//$mysqli = mysqli_connect($this->hostname, $this->userhost, $this->password, $this->dbname) or die ('Không thể kết nối tới database');
			$mysqli = mysqli_connect(getenv('HOST'), getenv('USER_NAME'), getenv('PASSWORD'), getenv('DB_NAME')) or die ('Không thể kết nối tới database');
			
			$res = mysqli_query($mysqli, $sql);
			if(!$res){
				die("Câu truy vấn sai");
			}

			if($type == "insert"){
				$row  = $res;
			}
			if($type == "select"){
				$row = mysqli_fetch_assoc($res);
			}
			return $row;

			//mysqli_close($mysqli);
		}
	}
?>