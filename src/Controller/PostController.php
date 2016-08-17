<?php

namespace Controller;

/**
 * PostController
 */
class PostController extends BaseController
{
    /**
     * home page
     *
     * @return  [type]
     */
    public function create()
    {
        $this->view->load('new-post', [
            'title' => 'Create new post'
        ]);
    }
}