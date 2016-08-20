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
    public function __construct()
    {
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
        session_start();
        
        if (isset($_SESSION['loggedin'])) {
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                $title   = $_POST['title'];
                $content = $_POST['content'];
                $user_id = $_SESSION['loggedin'];

                if ($_POST['submit'] == "save") {
                    $status = "saved";
                } elseif ($_POST['submit'] == "publish") {
                    $status = "published";
                }

                $post = new \Entity\Post($title);
                $post->setUser_Id($user_id);
                $post->setContent($content);
                $post->setStatus($status);
                $post->setCreate_At(time());

                $post = $this->postModel->addPost($post);
                if ($post) {
                    $this->redirect("/new-post");
                }
            } else {
                $this->view->load('new-post', [
                    'title' => 'Create new post'
                ]);
            }
        } else {
            $this->redirect("/login");
        }
    }
        
}