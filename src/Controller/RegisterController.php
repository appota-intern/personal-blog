<?php
namespace Controller;
use Entity;
use Model;
class RegisterController extends BaseController{
    public $wan1 = "";
    public $wan2 = "";

	public function register(){

        if(!empty($_POST ['name']) && !empty($_POST ['pass']) && !empty($_POST['email'])){
            $name     = $_POST['name'];
            $pass     = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $email    = $_POST['email'];
            $group_id = $_POST['group_id'];

            $usermodel = new model\UserModel();
            
            $row_email = $usermodel->checkDLN('email', $email);
            $row_name  = $usermodel->checkDLN('name', $name);
            
            //kiểm tra xem email nhập có bị trùng ko?
            if(($row_email > 0)){
                $this->wan1 = "email này đã có người dùng, nhập lại email khác";
                //$this->loadView('register');
                 $this->view->load('register', [
                'title' => 'Register'
            ]);
                exit;
            }

            //kiểm tra tên đăng nhập đã có người dùng hay chưa?
            if(($row_name > 0)){

                $this->wan2 = "tên này đã có người dùng, nhập lại tên khác";
               // $this->loadView('register');
                 $this->view->load('register', [
                    'title' => 'Register'
                ]);
                exit;
            }


            $row = $usermodel->addMember($name, $pass, $email, $group_id);
            // $user = new \Entity\User($name, $pass, $email, $group_id);
            // $row = $usermodel->addMember($user);
            // $row = $usermodel->addMember($name, $pass, $email, $group_id);

            if($row){
                 $this->redirect("/");
            }

           
        }
        //$this->loadView('register');
         $this->view->load('register', [
            'title' => 'Register'
        ]);
    }
}