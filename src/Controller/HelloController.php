<?php
namespace Controller;
class HelloController extends BaseController{
    
	public function hello() {
        session_start();
        if (isset($_SESSION['flag']) and ($_SESSION['flag'] == true)) {
            //$this->loadView('hello');
             $this->view->load('hello', [
                'title' => 'Hello'
            ]);
        } else {
            $this->redirect('/login');
        }
    }
}
