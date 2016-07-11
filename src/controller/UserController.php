<?php 

namespace Controller;

	abstract class BaseController{
		abstract public function redirect($uri);
	}

	class UserController extends BaseController{
		
		public function login(){
			if (isset ( $_SESSION['flag'] ) and $_SESSION['flag'] == true) {
				$this->redirect('/');
				return;
			}
			
			if (! empty ( $_POST ['username'] ) && ! empty ( $_POST ['userpass'] )) {
				$username = "trangnguyen";
				$password = "12345";
				if($_POST['username'] == $username and $_POST['userpass'] == $password){
				
					setcookie("id", session_id(), time() +1800);
					// echo "123";
					// return;
					$_SESSION['flag'] = true;
					$_SESSION['username'] = $_POST['username'];
					
					$this->redirect('/');
					//header ( 'location: http://localhost/project-tt/personal-blog/public/' );
					return;
				}
			
			}
				require_once '../src/view/login.php';
			} 
			
			
		public function logout(){
			session_unset();
			setcookie("id",true, time()-1800);
			//header ( 'location: http://localhost/project-tt/personal-blog/public/login');
			$this->redirect('/login');
			return;
		}
		
		public function hello(){
			require_once '../src/view/hello.php';
		}

		public function redirect($uri){
			header ( 'location:' . getenv('BASE_URI') . $uri);
		}
	}

