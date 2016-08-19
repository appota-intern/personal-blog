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
        
        if(isset($_SESSION['loggedin'])){

            if(!empty($_POST['title']) && !empty($_POST['content'])){
            $title   = $_POST['title'];
            $content = $_POST['content'];

            $user_id = $_SESSION['loggedin'];

            $status = 'saved';

            // $post = new \Model\PostModel();
            $res = $this->postModel->addPost($user_id, $title, $content, $status);

            $this->redirect("/new-post");
            }
            else{
                $this->view->load('new-post', [
                    'title' => 'Create new post'
                ]);
            }
        }
       else{
            echo "error";
       }
        
    }
}