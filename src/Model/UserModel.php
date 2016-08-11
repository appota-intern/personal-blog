<?php

// loi vi If your using an IDE, you must start your code at the very first line
namespace Model;
use Entity;
class UserModel extends BaseModel {

    public function checkData($username, $password) {
<<<<<<< HEAD

        // $sql = "SELECT `name`, `pass`, `email` FROM `user`  WHERE `name` = '" . $name . "'";
        // $row = $this->query($sql, "select");
        // if (password_verify($pass, $row['pass'])) {
        //     return true;
        // }
        // return false;

        // var_dump($username);
        // var_dump($password);

        // $sql = "SELECT name, pass, email FROM user WHERE name = ?";
        $sql = "SELECT name, pass, email FROM user WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();


        $stmt->bind_result($name, $pass, $email); 
=======

        // $sql = "SELECT `name`, `pass`, `email` FROM `user`  WHERE `name` = '" . $name . "'";
        // $row = $this->query($sql, "select");
        // if (password_verify($pass, $row['pass'])) {
        //     return true;
        // }
        // return false;

        $sql = "SELECT name, pass, email FROM user WHERE name = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();


        $stmt->bind_result($name, $pass, $email);
>>>>>>> 39f02db7ef892b95ac935f1ceaad3f3b69f7dbda
        $stmt->fetch();
        if (password_verify($password, $pass)) {
            return true;
        }
        return false;
    }

    public function addMember(\Entity\User $user) {

        //$sql = "INSERT INTO user (`name`, `pass`, `email`, `group_id`,`time`) VALUES ('" . $name . "', '" . $pass . "', '" . $email . "', '" . $group_id . "', '" . time() . "')";
<<<<<<< HEAD
        $stmt = $this->conn->prepare("INSERT INTO user (name, pass, email, group_id, time) VALUES (?, ?, ?, ?, ?)");
        $t = time();
        //$user = new \Entity\User($email);
        // $stmt->bind_param('ssssi', $user->getName(), $user->getPass(), $user->getEmail(), $user->getGroup_id(), $user->getTimeStamp());
        $tmp_getName = $user->getName();
        $tmp_getPass = $user->getPass();
        $tmp_getEmail = $user->getEmail();
        $tmp_getGroup_id = $user->getGroup_id();
        $tmp_getTimeStamp = $user->getTimeStamp();
               
        $stmt->bind_param('ssssi', $tmp_getName, $tmp_getPass, $tmp_getEmail, $tmp_getGroup_id, $tmp_getTimeStamp);
        $result = $stmt->execute();
        
        if ($result){
            $sql = "SELECT id, status FROM user WHERE email = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $tmp_getEmail);
            $stmt->execute();
            $stmt->bind_result($userId, $userStatus);
            $stmt->fetch();
            $user->setId($userId);
            $user->setStatus($userStatus);
            return $user;
        }

        //$row = $this->query($stmt, "insert");
        return false;
=======
        $stmt = $this->conn->prepare("INSERT INTO user(name, pass, email, group_id, time) VALUES (?, ?, ?, ?, ?)");
        $t = time();
        $stmt->bind_param("ssssi", $name, $pass, $email, $group_id, $t);
        $result = $stmt->execute();
        //$row = $this->query($stmt, "insert");
        return $result;
>>>>>>> 39f02db7ef892b95ac935f1ceaad3f3b69f7dbda
    }

    public function checkDLN($type, $value) {

        // $sql = "SELECT `" . $type . "` FROM `user` WHERE `" . $type . "` = '" . $value . "'";
        // $row = $this->query($sql, "select");
        // return $row;

        // $sql = "SELECT '" .$type. "' FROM user WHERE '". $type ."' = ?";
        $sql = "SELECT $type FROM user WHERE $type = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $value);
        $stmt->execute();
        $stmt->store_result();

        $num_of_rows = $stmt->num_rows;
        return $num_of_rows;
    }

}

