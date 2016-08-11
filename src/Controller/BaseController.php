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

    // public function loadView($view) {
<<<<<<< HEAD
    //  $this->title = $view;
=======
    // 	$this->title = $view;
>>>>>>> 39f02db7ef892b95ac935f1ceaad3f3b69f7dbda
    //     require_once '../src/view/header.php';
    //     require_once '../src/view/' . $view . '.php';
    //     require_once '../src/view/footer.php';

    // }

}

?>