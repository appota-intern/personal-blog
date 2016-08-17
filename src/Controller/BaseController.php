<?php
namespace Controller;
abstract class BaseController {
    /** @var \Lib\ViewManager */
    protected $view;
    /** @var \Lib\ModelManager */
    protected $model;

   // protected $userModel;

    public function __construct()
    {
        $this->view = new \Lib\ViewManager('src/view');
        $this->model = new \Lib\ModelManager();
        //$this->userModel = $this->model->load(\Model\UserModel::class);
    }

    public function redirect($uri) {
        header('location:' . getenv('BASE_URI') . $uri);
    }


}

?>