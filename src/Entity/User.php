<?php
namespace Entity;

class User 
{
    private $id;
    private $name;
    private $pass;
    private $email;
    private $group_id;
    private $status;
    private $timestamp;
    const STATUS_ACTIVATED = 'activated';  
    const STATUS_DEACTIVATED = 'deactivated'; 
    const STATUS_PENDING = 'pending'; 

    public function __construct($email) 
    {
        $this->email = $email;
    }

    public function getId() 
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPass() 
    {
        return $this->pass;
    }

    public function getEmail() 
    {
        return $this->email;
    }

    public function getGroup_id() 
    {
        return $this->group_id;
    }

    public function getStatus() 
    {
        return $this->status;
    }

    public function getTimeStamp() 
    {
        return $this->timestamp;
    }

    public function setId($id) 
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPass($pass) 
    {
        $this->pass = $pass;
    }

    public function setEmail($email) 
    {
        $this->email = $email;
    }

    public function setGroup_id($group_id) 
    {
        $this->group_id = $group_id;
    }

    public function setStatus($status) 
    {
        $this->status = $status;
    }

    public function setTimeStamp($timestamp) 
    {
        $this->timestamp = $timestamp;
    }

    public function isActivated()
    {
        if (($this->getStatus()) == (self::STATUS_ACTIVATED)) {
            return true;
        } else {
            return false;
        }
    }

}

?>