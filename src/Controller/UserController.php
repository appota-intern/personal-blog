<?php

namespace Controller;

class UserController extends BaseController {

    public function login() {
        if (isset($_SESSION['flag']) and $_SESSION['flag'] == true) {
            $this->redirect('/');
            return;
        }

        if (!empty($_POST ['username']) && !empty($_POST ['userpass'])) {
            $usernames = ["trangnguyen", "ngohai"];
            $passwords = ["12345", "12344321"];

            $id_name = array_search($_POST['username'], $usernames);

            if ($id_name && $_POST['userpass'] == $passwords[$id_name]) {

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
        $this->redirect('/login');
        return;
    }

    public function hello() {
        if (isset($_SESSION['flag']) and $_SESSION['flag'] == true) {
            $this->loadView('hello');
        } else {
            $this->redirect('/login');
        }
    }

    // public function loadView($view){
    // 	require_once '../src/view/footer.php';
    // }
}
