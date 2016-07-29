<?php
namespace Model;
require_once "../src/config.php";
	class BaseModel{
		// private $hostname = "localhost";
		// private $userhost = "root";
		// private $password = "";
		// private $dbname   = "user";


		public function query($sql, $type){
			//$mysqli = new mysqli($this->hostname, $this->userhost, $this->password, $this->dbname);
			$mysqli = mysqli_connect(getenv('HOST'), getenv('USER_NAME'), getenv('PASSWORD'), getenv('DB_NAME'));
			//$mysqli = new mysqli(getenv('HOST'), getenv('USER_NAME'), getenv('PASSWORD'), getenv('DB_NAME'));
			
			if ($mysqli->connect_errno) {
			    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
			}

			$res = mysqli_query($mysqli, $sql);
			if (!$res) {
			    echo "Failed to run query: (" . $mysqli->errno . ") " . $mysqli->error;
			}

			if($type == "insert"){
				$row  = $res;
			}
			if($type == "select"){
				$row = $res->fetch_assoc();
			}
			return $row;

			$mysqli->close();

		}
	}
?>