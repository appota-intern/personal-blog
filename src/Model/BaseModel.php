<?php
namespace Model;
require_once ("\..\config.php");
	class BaseModel{
		// private $hostname = "localhost";
		// private $userhost = "root";
		// private $password = "";
		// private $dbname   = "user";

		protected $conn;
		private $close;

		public function __construct(){
			$mysqli = new \mysqli(getenv('HOST'), getenv('USER_NAME'), getenv('PASSWORD'), getenv('DB_NAME'));
			$this->conn = $mysqli;
		}


		public function query($stmt, $type){
			//$mysqli = new mysqli($this->hostname, $this->userhost, $this->password, $this->dbname);
			//$mysqli = mysqli_connect(getenv('HOST'), getenv('USER_NAME'), getenv('PASSWORD'), getenv('DB_NAME'));
			// $mysqli = new \mysqli(getenv('HOST'), getenv('USER_NAME'), getenv('PASSWORD'), getenv('DB_NAME'));
			
			if ($this->conn->connect_errno) {
			    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
			}

			$res = mysqli_query($this->conn, $sql);
			if (!$res) {
			    echo "Failed to run query: (" . $mysqli->errno . ") " . $this->conn->error;
			}
			$res = $stmt->excute();

			if($type == "insert"){
				$row  = $res;
			}
			if($type == "select"){
				$row = $res->fetch_assoc();
			}
			return $row;
		}

		public function  __destruct(){
			//$mysqli->close();
			$this->close = $this->conn->close();
		}
	}
?>
?>