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

                $allowed_tags = ['p','br','b','i','img','span','h1','h2','h3','h4','h5','h6','a','ul','ol','li','tr','td','th'];
                $allowed_attrs = ['src','href','id', 'class', 'align'];

                $content = $this->post->validateInput($allowed_tags, $allowed_attrs, $content);
                $title   = $this->post->validateInput($allowed_tags, $allowed_attrs, $title);


                if (strlen($content) < 10) {
                    $error_post .= "Nội dung không hợp lệ";
                    $content = "";
                    $flag = false;
                }
                
                if (strlen($title) < 5) {
                    $error_post .= "Tiêu đề không hợp lệ </br>";
                    $title = "";
                    $flag = false;
                }

                if ($flag == true) {
                    /*
                    // $doc = new DOMDocument();
                    // $doc->loadHTML($content);
                    // $dom = $doc->documentElement;
                    // $block_tags = ['script'];
                    // foreach ($block_tags as $bt){
                    //     $tags = $doc->getElementsByTagName($bt);

                    //     foreach ($tags as $tag) {
                    //         $tag->parentNode->removeChild($tag);
                    //     }

                    // }

                    // $html_fragment = preg_replace('/^<!DOCTYPE.+?>/', '', str_replace( array('<html>', '</html>', '<body>', '</body>'), array('', '', '', ''), $doc->saveHTML()));
                    
                    */

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

    public function post($id) 
    {
        
        $post = $this->postModel->getPostByID($id);

        $content_post = $post->getContent();
        $title_post = $post->getTitle();

        $this->view->load('post', [
                'content_post' => $content_post,
                'title_post' => $title_post,
                'title' => 'Post',
            ]);
    }

    public function delete($id) 
    {

        $delete = $this->postModel->deletePost($id);

        $this->listPost();
    }

    public function edit($id) 
    {
        $flag = true;
        $error_post = "";
        $mes = "";

        $post = $this->postModel->getPostByID($id);
        
        $title = $post->getTitle();
        $content = $post->getContent();

        if (isset($_POST['title']) && isset($_POST['content'])){

            if ($_POST['submit'] == "save") {
                $status_new = "saved";

            } elseif ($_POST['submit'] == "publish") {
                $status_new = "published";

            }

            $title_new = $_POST['title'];
            $content_new = $_POST['content'];

            $allowed_tags = ['p','br','b','i','img','span','h1','h2','h3','h4','h5','h6','a','ul','ol','li','tr','td','th'];
            $allowed_attrs = ['src','href','id', 'class', 'align'];

            $content_new = $this->post->validateInput($allowed_tags, $allowed_attrs, $content_new);
            $title_new  = $this->post->validateInput($allowed_tags, $allowed_attrs, $title_new);

            if (strlen($content_new) < 10) {
                $error_post .= "Nội dung không hợp lệ";
                $content = "";
                $flag = false;
            }
                    
            if (strlen($title_new) < 5) {
                $error_post .= "Tiêu đề không hợp lệ </br>";
                $title = "";
                $flag = false;
            }

            if ($flag == true) {

                $edit = $this->postModel->editPost($id, $title_new, $content_new, $status_new);

                $mes = "Dữ liệu đã được sửa thành công";
            }

            $this->view->load('new-post', [
                    'title' => 'Create Post',
                    'title_post' => $title_new,
                    'content_post' => $content_new,
                    'mes' => $mes,
                    'error_post' => $error_post,
                ]);
        }

        else{
            $this->view->load('new-post', [
                'title_post' => $title,
                'content_post' => $content,
                'title' => 'Edit'
            ]);
        }

    }
}