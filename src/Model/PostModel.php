<?php
namespace Model;

class PostModel extends BaseModel
{
    public function addPost(\Entity\Post $post)
	{

		$stmt = $this->conn->prepare("INSERT INTO posts (user_id, title, content, status, created_at) VALUES (?, ?, ?, ?, ?)");

		$getUser_Id = $post->getUser_Id();
		$getTitle = $post->getTitle();
		$getContent = $post->getContent();
		$getStatus = $post->getStatus();
		$getCreated_At = $post->getCreated_At();

		$stmt->bind_param('isssi', $getUser_Id, $getTitle, $getContent, $getStatus, $getCreated_At);
		$stmt->execute();

		if ($stmt->affected_rows == 1) {
			$post->setId($stmt->insert_id);
            return $post;
		}

		return false;
	}

    public function deletePost($id)
    {
        
        $stmt = $this->conn->prepare("DELETE FROM posts WHERE id = ?");

        $stmt->bind_param('i', $id);
        $stmt->execute();

        if ($stmt->affected_rows == 1) {
            return true;
        }

        return false;

    }

    public function editPost($id)
    {
        //$stmt = $this->conn->prepare("")
    }

    public function getIDMax()
    {
        $sql = "SELECT max(id) AS id_max FROM posts";
        $stmt = $this->conn->prepare($sql);
        //$stmt->bind_param("i",;
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows < 1) {
            return false;
        }
        $row = $result->fetch_assoc();
        $result->free();

        return $row['id_max'];
    }

    public function getPostByID($id)
    {
        $sql = "SELECT * FROM posts WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows < 1) {
            return false;
        }
        $row = $result->fetch_assoc();
        $result->free();

        $post = new \Entity\Post($row['title']);
        $post->setId($row['id']);
        $post->setUser_Id($row['user_id']);
        $post->setContent($row['content']);
        $post->setStatus($row['status']);
        $post->setCreated_At($row['created_at']);
        return $post;
    }

    public function getListPost($filter=[], $limit=10, $skip=0) 
    {
        $sql = "SELECT * FROM posts WHERE 1 AND ";
        $bind = '';
        $params = array();
        foreach ($filter as $key => $value) {
            $b = '';
            switch (gettype($value)) {
                case 'integer':
                    $b = 'i';
                    break;
                case 'string':
                    $b = 's';
                    break;
                case 'double':
                    $b = 'd';
                    break;
            }
            $bind .= $b;
            
            $sql .= "$key = ? AND ";
        }
        array_push($params, $bind);
        foreach ($filter as $key => $value) {
            array_push($params, $value);
        }

        $tmp = array();
        foreach($params as $key => $value) {
            $tmp[$key] = &$params[$key];
        }
            

        // http://stackoverflow.com/questions/1913899/mysqli-binding-params-using-call-user-func-array
        // http://php.net/manual/en/mysqli-stmt.bind-param.php
        
        $sql .= "1 LIMIT $limit OFFSET $skip";
        $listPost = array();
        
        $stmt = $this->conn->prepare($sql);
        $count = 0;
        call_user_func_array(array($stmt, 'bind_param'), $tmp);
        
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows < 1) {
            return [];
        }
        
        while ($row = $result->fetch_assoc()) {
            $post = new \Entity\Post($row['title']);
            $post->setId($row['id']);
            $post->setUser_Id($row['user_id']);
            $post->setTitle($row['title']);
            $post->setContent($row['content']);
            $post->setStatus($row['status']);
            $post->setCreated_At($row['created_at']);

            array_push($listPost, $post);
        }
        
        return $listPost;
        
    }

}