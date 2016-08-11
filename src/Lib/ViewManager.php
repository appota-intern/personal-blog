<?php

namespace Lib;

/**
 * ViewManager
 */
class ViewManager
{
    private $viewDir;

    public function __construct($viewDir)
    {
        $this->viewDir = $viewDir;
    }

    public function load($view, $data = [])
    {
<<<<<<< HEAD
        // echo $this->viewDir.'/'.$view.'.php';
        // return;
        $file = $this->viewDir.'/'.$view.'.php';
        if (!file_exists($file)){
            // echo 'd\' exist';
            return;
        }
=======
        $file = $this->viewDir.'/'.$view.'.php';
        if (!file_exists($file))
            return;
>>>>>>> 39f02db7ef892b95ac935f1ceaad3f3b69f7dbda

        extract($data);

        require_once $file;
    }
}