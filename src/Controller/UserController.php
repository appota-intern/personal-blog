<?php
namespace Controller;
use Model;

class UserController extends BaseController {
    public $wan1 = "";
    public $wan2 = "";

    public function start(){
        $this->loadView('start');
    }

    public function login() {
        if ($this->checkLogin()) {
            $this->redirect('/hello');
            return;
        }

        if (!empty($_POST ['username']) && !empty($_POST ['userpass'])) {
            $username  = $_POST['username'];
            //$passwords= md5($_POST['userpass']);
            $passwords = $_POST['userpass'];
            $passwords_hash = password_hash($_POST['userpass'], PASSWORD_DEFAULT);

            $usermodel = new model\UserModel();



            $result = $usermodel->checkData($username, $passwords);
            
            if(!$result){

                setcookie("id", session_id(), time() + 1800);
                $_SESSION['flag'] = true;

                $_SESSION['username'] = $username;
                $this->redirect('/hello');
                return;
            }
        }
        $this->loadView('login');
    }

    public function logout() {
        session_unset();
        setcookie("id", true, time() - 1800);
        $this->redirect('/login');
        return;
    }

    public function hello() {
        if ($this->checkLogin()) {
            $this->loadView('hello');
        } else {
            $this->redirect('/login');
        }
    }

    public function checkLogin(){
        if(isset($_SESSION['flag']) and $_SESSION['flag'] == true)
            return true;
        else
            return false;
    }

    public function register(){

        //$wan = "";

        if(!empty($_POST ['name']) && !empty($_POST ['pass']) && !empty($_POST['email'])){
            $name     = $_POST['name'];
            //$pass     = md5($_POST['pass']);
            $pass     = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $email    = $_POST['email'];
            $group_id = $_POST['group_id'];

            $usermodel = new model\UserModel();
            
            $row_email = $usermodel->checkDLN('email', $email);
            $row_name  = $usermodel->checkDLN('name', $name);


            //kiểm tra xem email nhập có bị trùng ko?
            if(!empty($row_email)){
                $this->wan1 = "email này đã có người dùng, nhập lại email khác";
                $this->loadView('register');
                exit;
            }

            //kiểm tra tên đăng nhập đã có người dùng hay chưa?
            if(!empty($row_name)){

                $this->wan2 = "tên này đã có người dùng, nhập lại tên khác";
                $this->loadView('register');
                exit;
            }


            $row = $usermodel->addMember($name, $pass, $email, $group_id);
            //echo count($row);
            if($row){
                 $this->redirect("/home");
            }

           
        }
        $this->loadView('register');
    }

    public function home(){
        $this->loadView('home');
    }
}

?>