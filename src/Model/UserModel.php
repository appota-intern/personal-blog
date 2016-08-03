<?php

// loi vi If your using an IDE, you must start your code at the very first line

namespace Model;

class UserModel extends BaseModel {

    public function checkData($name, $pass) {

        $sql = "SELECT `name`, `pass`, `email` FROM `user`  WHERE `name` = '" . $name . "'";
        $row = $this->query($sql, "select");
        if (password_verify($pass, $row['pass'])) {
            return true;
        }
        return false;
    }

    public function addMember($name, $pass, $email, $group_id) {

        //$sql = "INSERT INTO user (`name`, `pass`, `email`, `group_id`,`time`) VALUES ('" . $name . "', '" . $pass . "', '" . $email . "', '" . $group_id . "', '" . time() . "')";
        $stmt = $this->conn->prepare("INSERT INTO user(name, pass, email, group_id, time) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $name, $pass, $email, $group_id, time());
        $row = $stmt->excute();
        //$row = $this->query($stmt, "insert");
        return $row;
    }

    public function checkDLN($type, $value) {

        $sql = "SELECT `" . $type . "` FROM `user` WHERE `" . $type . "` = '" . $value . "'";
        $row = $this->query($sql, "select");
        return $row;
    }

}
