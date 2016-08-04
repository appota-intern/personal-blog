<?php

// loi vi If your using an IDE, you must start your code at the very first line

namespace Model;

class UserModel extends BaseModel {

    public function checkData($username, $password) {

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
        $stmt->fetch();
        if (password_verify($password, $pass)) {
            return true;
        }
        return false;
    }

    public function addMember($name, $pass, $email, $group_id) {

        //$sql = "INSERT INTO user (`name`, `pass`, `email`, `group_id`,`time`) VALUES ('" . $name . "', '" . $pass . "', '" . $email . "', '" . $group_id . "', '" . time() . "')";
        $stmt = $this->conn->prepare("INSERT INTO user(name, pass, email, group_id, time) VALUES (?, ?, ?, ?, ?)");
        $t = time();
        $stmt->bind_param("ssssi", $name, $pass, $email, $group_id, $t);
        $result = $stmt->execute();
        //$row = $this->query($stmt, "insert");
        return $result;
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
