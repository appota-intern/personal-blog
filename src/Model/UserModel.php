<?php

// loi vi If your using an IDE, you must start your code at the very first line
namespace Model;

use Entity;

class UserModel extends BaseModel
{

    // public function checkData($username, $password)
    // {
    //     // $sql = "SELECT `name`, `pass`, `email` FROM `user`  WHERE `name` = '" . $name . "'";
    //     // $row = $this->query($sql, "select");
    //     // if (password_verify($pass, $row['pass'])) {
    //     //     return true;
    //     // }
    //     // return false;

    //     // $sql = "SELECT name, pass, email FROM user WHERE name = ?";
    //     $sql  = "SELECT name, pass, email FROM user WHERE email = ?";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->bind_param("s", $username);
    //     $stmt->execute();

    //     $stmt->bind_result($name, $pass, $email);

    //     $stmt->fetch();
    //     if (password_verify($password, $pass)) {
    //         return true;
    //     }
    //     return false;
    // }

    public function addMember(\Entity\User $user)
    {

        //$sql = "INSERT INTO user (`name`, `pass`, `email`, `group_id`,`time`) VALUES ('" . $name . "', '" . $pass . "', '" . $email . "', '" . $group_id . "', '" . time() . "')";

        $stmt = $this->conn->prepare("INSERT INTO user (pass, email, group_id, time) VALUES (?, ?, ?, ?)");
        
        $tmp_getPass      = $user->getPass();
        $tmp_getEmail     = $user->getEmail();
        $tmp_getGroup_id  = $user->getGroup_id();
        $tmp_getTimeStamp = $user->getTimeStamp();

        $stmt->bind_param('sssi', $tmp_getPass, $tmp_getEmail, $tmp_getGroup_id, $tmp_getTimeStamp);
        $result = $stmt->execute();

        if ($result) {
            $sql  = "SELECT id, status FROM user WHERE email = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $tmp_getEmail);
            $stmt->execute();
            $stmt->bind_result($userId, $userStatus);
            $stmt->fetch();
            $user->setId($userId);
            $user->setStatus($userStatus);
            return $user;
        }
        return false;
    }

    public function checkUser($type, $value)
    {

        // $sql = "SELECT '" .$type. "' FROM user WHERE '". $type ."' = ?";
        $sql  = "SELECT $type FROM user WHERE $type = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $value);
        $stmt->execute();
        $stmt->store_result();

        $num_of_rows = $stmt->num_rows;
        return $num_of_rows;
    }

    public function getUserByEmail($email){
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

    public function getUserById($id){
        $sql = "SELECT * FROM user WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if($result->num_rows < 1){
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
