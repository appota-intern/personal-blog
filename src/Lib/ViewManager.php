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
        // echo $this->viewDir.'/'.$view.'.php';
        // return;
        $file = $this->viewDir.'/'.$view.'.php';
        if (!file_exists($file)){
            // echo 'd\' exist';
            return;
        }

        extract($data);

        require_once $file;
    }
}