<?php
namespace Controller;

abstract class BaseController 
{
    /** @var \Lib\ViewManager */
    protected $view;
    /** @var \Lib\ModelManager */
    protected $model;
    /**@var \Lib\PostManager */
    protected $post;


    public function __construct()
    {
        $this->view = new \Lib\ViewManager('src/View');
        $this->model = new \Lib\ModelManager();
        $this->post = new \Lib\PostManager();
    }

    public function redirect($uri)
    {
        header('location:' . getenv('BASE_URI') . $uri);
    }

}

?>