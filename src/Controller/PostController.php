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
        $note = "";
        $error_post = "";

        if (isset($_SESSION['loggedin'])) {

            if(empty($_POST['title']) or empty($_POST['content'])) {
                $error_post = "Trường này không được rỗng";
            }

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
                $post->setCreated_At(time());

                $post = $this->postModel->addPost($post);

                $note = "Dữ liệu đã được thêm thành công";
            }

            $this->view->load('new-post', [
                'title' => 'Create Post',
                'note' => $note,
                'error_post' => $error_post
            ]);
        } else {
            $this->redirect("/login");
        }
    }

    public function showPost()
    {
        $idmax = $this->postModel->getIDMax();
        for ($i = 30; $i < $idmax; $i++) {

            $post = $this->postModel->getPostByID($i);
            $title_post = $post->getTitle();
            $content_post = $post->getContent();
            $status_post = $post->getStatus();
            $created_at_post = $post->getCreated_At();
            $created_at_post = date('Y-m-d', $created_at_post);

            $this->view->load('fullpost', [
                    'title' => 'Full post',
                    'title_post' => $title_post,
                    'content_post' => $content_post,
                    'id_post' => $i,
                    'status_post' => $status_post,
                    'create_at_post' => $created_at_post
            ]);
        }
        
    }
        
}