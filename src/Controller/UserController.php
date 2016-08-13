<?php
namespace Controller;

use Entity;
use Model;

//require_once "/../config.php";
require_once "\..\config.php";
class UserController extends BaseController
{

    public function login()
    {
        session_start();
        // if (isset($_SESSION['flag']) and $_SESSION[''] == true) {

        if (isset($_SESSION['loggedin'])) {
            $this->redirect('/hello');
            return;
        }
        //echo '123';
        if (!empty($_POST['username']) && !empty($_POST['userpass'])) {
            $username       = $_POST['username'];
            $passwords      = $_POST['userpass'];
            $passwords_hash = password_hash($_POST['userpass'], PASSWORD_DEFAULT);

            // $usermodel = new Model\UserModel();
            $userModel = $this->model->load(Model\UserModel::class);

            $user = $userModel->getUserByEmail($username);


            if($user){

                $pass = $user->getPass();
                if (password_verify($passwords, $pass)) {

                    setcookie("id", session_id(), time() + 1800);
                    //$_SESSION['flag'] = true;

                    //$_SESSION['username'] = $username;

                    $userId = $user->getId();
                    $username = $user->getName();
                    $_SESSION['loggedin'] = $userId;
                    $_SESSION['username'] = $username;
                    $this->redirect('/hello');
                    return;
                }

             }
        }
        $this->view->load('login', [
            'title' => 'Login'
        ]);
    }

    public function logout()
    {
        session_start();
        session_unset();
        setcookie("id", true, time() - 1800);
        $this->redirect('/login');
        return;
    }

    public function hello()
    {
        session_start();
        if ($this->checkLogin()) {
            //$this->loadView('hello');
            $this->view->load('hello', [
                'title' => 'Hello'
            ]);
        } else {
            $this->redirect('/login');
        }
    }

    public function checkLogin()
    {
        // if (isset($_SESSION['flag']) and $_SESSION['flag'] == true) {
        if (isset($_SESSION['loggedin'])) {
            return true;
        } else {
            return false;
        }

    }

    public function register()
    {

        //$wan = "";

        if (!empty($_POST['name']) && !empty($_POST['pass']) && !empty($_POST['email'])) {
            $name = $_POST['name'];
            //$pass     = md5($_POST['pass']);
            $pass     = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $email    = $_POST['email'];
            $group_id = $_POST['group_id'];

            $usermodel = new model\UserModel();

            $row_email = $usermodel->checkUser('email', $email);
            $row_name  = $usermodel->checkUser('name', $name);

            //kiểm tra xem email nhập có bị trùng ko?
            if (($row_email > 0)) {
                //$this->wan1 = "email này đã có người dùng, nhập lại email khác";
                //$this->loadView('register');
                $this->view->load('register', [
                    'title' => 'Register',
                    'error1' => 'Email này đã có người dùng, nhập lại email khác'
                ]);
                exit;
            }

            //kiểm tra tên đăng nhập đã có người dùng hay chưa?
            if (($row_name > 0)) {

                //$this->wan2 = "tên này đã có người dùng, nhập lại tên khác";
                // $this->loadView('register');
                $this->view->load('register', [
                    'title' => 'Register',
                    'error2' => 'Tên này đã có người dùng, nhập lại tên khác'
                ]);
                exit;
            }

            //$row = $usermodel->addMember($name, $pass, $email, $group_id);
            $user = new \Entity\User($email);
            $user->setName($name);
            $user->setPass($pass);
            $user->setGroup_id($group_id);
            $user->setStatus('pending');
            $user->setTimeStamp(time());

            $user = $usermodel->addMember($user);
            if ($user) {
                $this->redirect("/");
            }

        }
        //$this->loadView('register');
        $this->view->load('register', [
            'title' => 'Register'
        ]);
    }

    public function post(){
        $this->view->load('post', [
            'title' => 'Admin'
        ]);
    }

}
