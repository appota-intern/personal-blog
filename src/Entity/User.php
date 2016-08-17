<?php
namespace Entity;
class User {

    private $id;
    private $pass;
    private $email;
    private $group_id;
    private $status;
    private $timestamp;

    public function __construct($email) {
        //$this->id = $id;
        //$this->name = $name;
        //$this->pass = $pass;
        $this->email = $email;
        //$this->group_id = $group_id;
        //$this->status = $status;
        //$this->timestamp = $timestamp;
    }

    // public function __construct($id, $name, $pass, $email, $group_id){
    //     $this->id = $id;
    //     $this->name = $name;
    //     $this->pass = $pass;
    //     $this->email = $email;
    //     $this->group_id = $group_id;
    // }

    public function getId() {
        return $this->id;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getGroup_id() {
        return $this->group_id;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getTimeStamp() {
        return $this->timestamp;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setGroup_id($group_id) {
        $this->group_id = $group_id;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setTimeStamp($timestamp) {
        $this->timestamp = $timestamp;
    }

}

?>