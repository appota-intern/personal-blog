<?php
namespace Controller;
abstract class BaseController {
    protected $view;

    public function __construct()
    {
        $this->view = new \Lib\ViewManager('src/view');
    }

    public function redirect($uri) {
        header('location:' . getenv('BASE_URI') . $uri);
    }


}

?>