<?php
namespace Controller;

use Entity;
use Model;

class UserController extends BaseController
{
    protected $userModel;
    public function __construct(){
        parent::__construct();
        $this->userModel = $this->model->load(\Model\UserModel::class);
    }

    public function login()
    {
        session_start();

        if (isset($_SESSION['loggedin'])) {
            $this->redirect('/hello');
            return;
        }
        $error = '';
        $username = '';
        if (!empty($_POST['username']) && !empty($_POST['userpass'])) {
            $username       = $_POST['username'];
            $passwords      = $_POST['userpass'];
            $passwords_hash = password_hash($_POST['userpass'], PASSWORD_DEFAULT);

            $user = $this->userModel->getUserByEmail($username);

            if($user){

                $pass = $user->getPass();
                if (password_verify($passwords, $pass)) {
                    setcookie("id", session_id(), time() + 1800);

                    $userId = $user->getId();
                    $username = $user->getName();
                    $_SESSION['loggedin'] = $userId;
                    $_SESSION['username'] = $username;
                    $this->redirect('/hello');
                    return;
                }

            }

            $error = 'Wrong email or password';

        }
        $this->view->load('login', [
            'title' => 'Login',
            'username' => $username,
            'error' => $error
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
            $this->view->load('hello', [
                'title' => 'Hello'
            ]);
        } else {
            $this->redirect('/login');
        }
    }

    public function checkLogin()
    {
        if (isset($_SESSION['loggedin'])) {
            return true;
        } else {
            return false;
        }

    }

    public function register()
    {


        if (!empty($_POST['name']) && !empty($_POST['pass']) && !empty($_POST['email'])) {
            $name = $_POST['name'];
            $pass     = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $email    = $_POST['email'];
            //$group_id = $_POST['group_id'];
            $repeatPass = $_POST['repeatPass'];

            $row_email = $this->userModel->checkUser('email', $email);
            $row_name  = $this->userModel->checkUser('name', $name);

            //kiểm tra xem email nhập có bị trùng ko?
            if (($row_email > 0)) {
                $this->view->load('register', [
                    'title' => 'Register',
                    'error1' => 'Email này đã có người dùng, nhập lại email khác'
                ]);
                exit;
            }

            //kiểm tra tên đăng nhập đã có người dùng hay chưa?
            if (($row_name > 0)) {
                $this->view->load('register', [
                    'title' => 'Register',
                    'error2' => 'Tên này đã có người dùng, nhập lại tên khác'
                ]);
                exit;
            }

            //kiểm tra password nhập lại có chính xác hay không?
            if($repeatPass != $_POST['pass']){
                $this->view->load('register', [
                    'title' => 'Register',
                    'error3' => 'Password không khớp'
                ]);
                exit;
            }

            $user = new \Entity\User($email);
            $user->setName($name);
            $user->setPass($pass);
            $user->setGroup_id('user');
            $user->setStatus('pending');
            $user->setTimeStamp(time());

            $user = $this->userModel->addMember($user);
            if ($user) {
                $this->redirect("/");
            }

        }
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
