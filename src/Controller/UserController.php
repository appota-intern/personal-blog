<?php

namespace Controller;

class UserController extends BaseController {

//    public $name;


    public static function user() {
        if(self::check()){
            return $_SESSION['username'];
        }  else {
            return FALSE;
        }
    }
    
    public function login() {
        if ($this->check()) {
            $this->redirect('/');
            return;
        }

        if (!empty($_POST ['username']) && !empty($_POST ['userpass'])) {
            $usernames = ["trangnguyen", "ngohai","ducanh"];
            $passwords = ["12345", "12344321","12345678"];

            $id_name = array_search($_POST['username'], $usernames);

            if ($id_name!==false && $_POST['userpass'] == $passwords[$id_name]) {

                setcookie("id", session_id(), time() + 1800);
                $_SESSION['flag'] = true;
                $_SESSION['username'] = $_POST['username'];

                $this->redirect('/');
                return;
            }
        }
        $this->loadView('login');
    }

    public function logout() {
        session_unset();
        setcookie("id", true, time() - 1800);
        $this->redirect('/');
        return;
    }

    public function hello() {
//        if ($this->check()) {
            $this->loadView('hello');
//        } else {
//            $this->redirect('/login');
//        }
    }

    public static function check() {
        if (isset($_SESSION['flag']) and $_SESSION['flag'] == true) {
            return TRUE;
        }
        return FALSE;
    }
    // public function loadView($view){
    // 	require_once '../src/view/footer.php';
    // }
}
