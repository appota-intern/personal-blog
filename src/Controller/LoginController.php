<?php
namespace Controller;
use Model;
class LoginController extends BaseController{

	public function login() {
        session_start(); 
        if (isset($_SESSION['flag']) and $_SESSION['flag'] == true) {
            $this->redirect('/hello');
            return;
        }

        if (!empty($_POST ['username']) && !empty($_POST ['userpass'])) {
            $username  = $_POST['username'];
            $passwords = $_POST['userpass'];
            $passwords_hash = password_hash($_POST['userpass'], PASSWORD_DEFAULT);
        
            $usermodel = new model\UserModel();



            $result = $usermodel->checkData($username, $passwords);

            
            if($result){

                setcookie("id", session_id(), time() + 1800);
                $_SESSION['flag'] = true;

                $_SESSION['username'] = $username;
                $this->redirect('/hello');
                return;
            }
        }
        //$this->loadView('login');
         $this->view->load('login', [
            'title' => 'Login'
        ]);
    }
 
}