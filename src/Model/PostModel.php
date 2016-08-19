<?php
namespace Model;
class PostModel extends BaseModel{
	public function addPost(\Entity\Post $post){

		$stmt = $this->conn->prepare("INSERT INTO posts (user_id, title, content, status, create_at) VALUES (?, ?, ?, ?, ?)");

		$getUser_Id = $post->getUser_Id();
		$getTitle = $post->getTitle();
		$getContent = $post->getContent();
		$getStatus = $post->getStatus();
		$getCreate_At = $post->getCreate_At();

		$stmt->bind_param('ssssi', $getUser_Id, $getTitle, $getContent, $getStatus, $getCreate_At);
		$result = $stmt->execute();
		//$result = $stmt->get_result();

		if($result){
			$sql = "SELECT id FROM posts WHERE id = ?";
			$stmt = $this->conn->prepare($sql);
           // $stmt->bind_param("s", max(id));
            $stmt->execute();
            $stmt->bind_result($postId);
            $stmt->fetch();
            $post->setId($postId);
            //$user->setStatus($userStatus);
            return $post;
		}

		return false;

	}

}