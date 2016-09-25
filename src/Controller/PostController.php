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
        $flag = true;

        if (isset($_SESSION['loggedin'])) {

            if(empty($_POST['title']) or empty($_POST['content'])) {
                $error_post = "Tiêu đề và nội dung không được rỗng";
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

                if (strlen($content) < 10) {
                    $error_post .= "Nội dung phải dài tối thiểu 10 kí tự trở lên</br>";
                    $content = "";
                    $flag = false;
                }
                
                if (strlen($title) < 5) {
                    $error_post .= "Tiêu đề phải dài tối thiểu từ 5 kí tự trở lên</br>";
                    $title = "";
                    $flag = false;
                }

                if ($flag == true) {
                    $post = new \Entity\Post($title);
                    $post->setUser_Id($user_id);
                    $post->setContent($content);
                    $post->setStatus($status);
                    $post->setCreated_At(time());

                    $post = $this->postModel->addPost($post);

                    $note = "Dữ liệu đã được thêm thành công";
                }

            }

            $this->view->load('new-post', [
                'title' => 'Create Post',
                'note' => $note,
                'error_post' => $error_post,
            ]);

        } else {
            $this->redirect("/login");
        }
    }

    public function listPost()
    {

        $listPost = $this->postModel->getListPost(array(
            'user_id' => 1

        ));
        
        $this->view->load('fullpost', [
                'listPost' => $listPost, 
                'title' => 'Full post'
            ]); 
    }

    public function showPost() 
    {
        $listPost = $this->postModel->getListPost(array(
            'status' => 'published',
            'user_id' => 1

        ));

         $this->view->load('home', [
                'listPost' => $listPost, 
                'title' => 'Home'
            ]); 
    }
}