<?php
namespace Model;
class PostModel extends BaseModel{
	public function addPost($user_id, $title, $body, $status){
		$stmt = $this->conn->prepare("INSERT INTO posts (user_id, title, body, status, create_at) VALUES (?, ?, ?, ?, ?)");
		$t = time();
		$stmt->bind_param('ssssi', $user_id, $title, $body, $status, $t);
		$stmt->execute();
		$result = $stmt->get_result();

		return $result;

		// $row = $result->fetch_array(MYSQLI_NUM);
		

		// return $row;

	}

}