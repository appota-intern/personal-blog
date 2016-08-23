<?php
namespace Controller;

use Entity;
use Model;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
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
        $passwords = '';
        if (!empty($_POST['username']) && !empty($_POST['userpass'])) {
            $username       = $_POST['username'];
            $passwords      = $_POST['userpass'];
            $passwords_hash = password_hash($_POST['userpass'], PASSWORD_DEFAULT);

            $user = $this->userModel->getUserByEmail($username);

            if ($user) {

                if (!empty($_POST['remember'])) {
                    setcookie('member_login', $username, time() + (86400 * 10));
                    
                } else {
                    if (isset($_COOKIE["member_login"])) {
                        setcookie("member_login", "");

                    }
                    
                }

                $pass = $user->getPass();
                if (password_verify($passwords, $pass)) {
                    setcookie("id", session_id(), time() + 1800);

                    $userId = $user->getId();
                    $username = $user->getEmail();
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
            'error' => $error,
            'passwords' => $passwords
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
        $email = '';


        if (!empty($_POST['pass']) && !empty($_POST['email'])) {
            
            $pass     = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            $email    = $_POST['email'];
            $repeatPass = $_POST['repeatPass'];

            $row_email = $this->userModel->checkUser('email', $email);

            //validate email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $this->view->load('register', [
                        'title' => 'Register',
                        'error_validate' => 'Địa chỉ email không hợp lệ'
                ]);

                return;
            }

            // check pass
            if (!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*\W).{8,8}$/', $_POST['pass'])) { 
                $this->view->load('register', [
                    'title' => 'Register',
                    'error_pass' => 'Password phải có chiều dài 8 kí tự, tồn tại 1 kí tự đặc biệt, 1 kí tự in hoa và 1 chữ số'
                ]);

                return;
            }

            //kiểm tra xem email nhập có bị trùng ko?
            if (($row_email > 0)) {
                $this->view->load('register', [
                    'title' => 'Register',
                    'error_email' => 'Email này đã có người dùng, nhập lại email khác'
                ]);

                return;
            }

            //kiểm tra password nhập lại có chính xác hay không?
            if ($repeatPass != $_POST['pass']) {
                $this->view->load('register', [
                    'title' => 'Register',
                    'error_repeatpass' =>'Password không khớp'
                ]);

                return;
            }

            $user = new \Entity\User($email);
            $index = stripos($email, "@gmail");
            $name = substr($email, 0, $index);
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
            'title' => 'Register',
            'email' => $email
        ]);
    }

}
