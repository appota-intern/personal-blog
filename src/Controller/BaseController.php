<?php

namespace Controller;

abstract class BaseController {

    public function redirect($uri) {
        header('location:' . getenv('BASE_URI') . $uri);
    }

    public function loadView($view) {

        require_once '../src/view/header.php';
        require_once '../src/view/' . $view . '.php';
        require_once '../src/view/footer.php';
    }

}

?>