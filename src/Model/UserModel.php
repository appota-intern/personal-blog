<?php
namespace Model;

use Entity;

class UserModel extends BaseModel
{
    public function addMember(\Entity\User $user)
    {
        $stmt = $this->conn->prepare("INSERT INTO user (name, pass, email, group_id, time) VALUES (?, ?, ?, ?, ?)");
        
        $tmp_getName      = $user->getName();
        $tmp_getPass      = $user->getPass();
        $tmp_getEmail     = $user->getEmail();
        $tmp_getGroup_id  = $user->getGroup_id();
        $tmp_getTimeStamp = $user->getTimeStamp();

        $stmt->bind_param('ssssi', $tmp_getName, $tmp_getPass, $tmp_getEmail, $tmp_getGroup_id, $tmp_getTimeStamp);
        $result = $stmt->execute();

        if ($stmt->affected_rows == 1) {
    
            $user->setId($stmt->insert_id);
            return $user;
        }
        return false;
    }

    public function checkUser($type, $value)
    {
        $sql  = "SELECT $type FROM user WHERE $type = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $value);
        $stmt->execute();
        $stmt->store_result();

        $num_of_rows = $stmt->num_rows;
        return $num_of_rows;
    }

    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if ($result->num_rows < 1) {
            return false;
        }
        $row = $result->fetch_assoc();
        $result->free();
        $user = new \Entity\User($row['email']);
        $user->setId($row['id']);
        $user->setPass($row['pass']);
        $user->setStatus($row['status']);
        $user->setTimeStamp($row['time']);
        $user->setGroup_id($row['group_id']);
        return $user;
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM user WHERE id = ?";
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

        $user = new \Entity\User($row['email']);
        $user->setId($row['id']);
        $user->setPass($row['pass']);
        $user->setStatus($row['status']);
        $user->setTimeStamp($row['time']);
        $user->setGroup_id($row['group_id']);
        return $user;
    }

}
