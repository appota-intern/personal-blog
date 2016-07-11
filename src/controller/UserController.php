<?php 
namespace Controller;
	class UserController{
		
		public function login(){
			if (isset ( $_SESSION['flag'] ) and $_SESSION['flag'] == true) {
				header ( 'location: /project-tt/personal-blog/public/' );
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
			
					header ( 'location: /project-tt/personal-blog/public/' );
					return;
				}
			
			}
				require_once '../src/view/login.php';
			} 
			
			
		public function logout(){
			session_unset();
			setcookie("id",true, time()-1800);
			header ( 'location: /project-tt/personal-blog/public/login');
			return;
		}
		
		public function hello(){
			require_once '../src/view/hello.php';
		}
	}
