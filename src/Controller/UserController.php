<?php 

namespace Controller;



	class UserController extends BaseController{
		
		
		public function login(){
//			$this->loadView('header');
			if (isset ( $_SESSION['flag'] ) and $_SESSION['flag'] == true) {
				$this->redirect('/');
				return;
			}
			
			if (! empty ( $_POST ['username'] ) && ! empty ( $_POST ['userpass'] )) {
				$usernames = ["trangnguyen","ngohai"];
				$passwords = ["12345","12344321"];
                                
                                $id_name = array_search($_POST['username'], $usernames);
                                
				if($id_name && $_POST['userpass'] == $passwords[$id_name]){
				
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
//				require_once '../src/view/login.php';
				$this->loadView('login');
			} 
			
			
		public function logout(){
//			$this->loadView('header');
			session_unset();
			setcookie("id",true, time()-1800);
			//header ( 'location: http://localhost/project-tt/personal-blog/public/login');
			$this->redirect('/login');
//			$this->loadView('footer');
			return;
		}
		
		public function hello(){
//			$this->loadView('header');
			require_once '../src/view/hello.php';
			$this->loadView('hello');
		}

		// public function loadView($view){
		// 	require_once '../src/view/footer.php';
		// }

	}

