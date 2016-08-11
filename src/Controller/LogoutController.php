<?php
namespace Controller;
class LogoutController extends BaseController{

	public function logout() {
        session_start();
        session_unset();
        setcookie("id", true, time() - 1800);
        $this->redirect('/login');
        return;
    }
}
