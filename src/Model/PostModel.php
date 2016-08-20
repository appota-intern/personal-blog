<?php
namespace Model;

class PostModel extends BaseModel
{
    public function addPost(\Entity\Post $post)
	{

		$stmt = $this->conn->prepare("INSERT INTO posts (user_id, title, content, status, create_at) VALUES (?, ?, ?, ?, ?)");

		$getUser_Id = $post->getUser_Id();
		$getTitle = $post->getTitle();
		$getContent = $post->getContent();
		$getStatus = $post->getStatus();
		$getCreate_At = $post->getCreate_At();

		$stmt->bind_param('ssssi', $getUser_Id, $getTitle, $getContent, $getStatus, $getCreate_At);
		$stmt->execute();

		if ($stmt->affected_rows == 1) {
			$post->setId($stmt->insert_id);
            return $post;
		}

		return false;
	}

}