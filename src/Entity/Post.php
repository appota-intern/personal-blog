<?php
namespace Entity;
class Post{
	private $id;
	private $user_id;
	private $title;
	private $content;
	private $status;
	private $create_at;

	public function __construct($title){
		$this->title = $title;
	}

	public function getId(){
		return $this->id;
	}

	public function getUser_Id(){
		return $this->user_id;
	}

	public function getTitle(){
		return $this->title;
	}

	public function getContent(){
		return $this->content;
	}

	public function getStatus(){
		return $this->status;
	}

	public function getCreate_At(){
		return $this->create_at;
	}

//SET
	public function setId($id){
		$this->id = $id;
	}

	public function setUser_Id($user_id){
		$this->user_id = $user_id;
	}

	public function setTitle($title){
		$this->title = $title;
	}

	public function setContent($content){
		$this->content = $content;
	}

	public function setStatus($status){
		$this->status = $status;
	}

	public function setCreate_At($create_at){
		$this->create_at = $create_at;
	}
}