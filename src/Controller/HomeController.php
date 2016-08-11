<?php

namespace Controller;

/**
 * HomeController
 */
class HomeController extends BaseController
{
    /**
     * home page
     *
     * @return  [type]
     */
    public function index()
    {
        $this->view->load('home', [
            'title' => 'Home'
        ]);
    }
}