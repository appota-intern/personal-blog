<?php
namespace Model;

class BaseModel
{
	protected $conn;
	private $close;

	public function __construct($conn)
	{
		$this->conn = $conn;
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	}

	public function query($stmt, $type)
	{
		if ($this->conn->connect_errno) {
			echo "Failed to connect to MySQL: " . $mysqli->connect_error;
		}

		$res = mysqli_query($this->conn, $sql);
		if (!$res) {
			echo "Failed to run query: (" . $mysqli->errno . ") " . $this->conn->error;
		}
		
		$res = $stmt->excute();

		if ($type == "insert") {
			$row  = $res;
		}
		if ($type == "select") {
			$row = $res->fetch_assoc();
		}

		return $row;
	}

	public function  __destruct()
	{
		$this->close = $this->conn->close();
	}
}