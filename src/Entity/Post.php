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
		return $id;
	}

	public function getUser_Id(){
		return $user_id;
	}

	public function getTitle(){
		return $title;
	}

	public function getContent(){
		return $content;
	}

	public function getStatus(){
		return $status;
	}

	public function getCreate_At(){
		return $create_at;
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