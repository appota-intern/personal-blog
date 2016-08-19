<?php

namespace Controller;
use Model;
use Entity;

/**
 * PostController
 */
class PostController extends BaseController
{

    protected $postModel;
    public function __construct(){
        parent::__construct();
        $this->postModel = $this->model->load(\Model\PostModel::class);
    }

    /**
     * home page
     *
     * @return  [type]
     */
    public function create()
    {
        $this->view->load('new-post', [
            'title' => 'Create new post'
        ]);
    }

    public function post(){
        session_start();
        if(!empty($_POST['title']) && !empty($_POST['content'])){
            $title   = $_POST['title'];
            $content = $_POST['content'];

            $user_id = $_SESSION['loggedin'];
            // if(isset($_POST['status'])){
            //     $status = 'published';
            // }
            // if(isset($_POST['save'])){
            //     $status = 'saved';
            // }

            // if(isset($_POST['delete'])){
            //     $status = 'delete';
            // }

            $status = 'saved';

            // $post = new \Model\PostModel();
            $res = $this->postModel->addPost($user_id, $title, $content, $status);

            // var_dump($res);

            // if($res){
            //     $this->redirect("/new-post");
            // }

            $this->redirect("/new-post");
        }
        else{
            $this->view->load('new-post', [
                'title' => 'Create new post'
            ]);
        }
    }
}