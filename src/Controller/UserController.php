<?php
namespace Controller;
use model;

class UserController extends BaseController {
    public function start(){
        $this->loadView('start');
    }

    public function login() {
        if ($this->checkLogin()) {
            $this->redirect('/hello');
            return;
        }

        if (!empty($_POST ['username']) && !empty($_POST ['userpass'])) {
            $username = $_POST['username'];
            $passwords= md5($_POST['userpass']);

            $usermodel = new model\UserModel();

            $result = $usermodel->checkData($username, $passwords);
            
            if($result){

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

        
        if(!empty($_POST ['name']) && !empty($_POST ['pass']) && !empty($_POST['email'])){
            $name = $_POST['name'];
            $pass = md5($_POST['pass']);
            $email    = $_POST['email'];
            $group_id = $_POST['group_id'];

            $usermodel = new model\UserModel();
            //kiểm tra xem email nhập có bị trùng ko?
            if($usermodel->checkDLN($email)){
                echo "email này đã có người dùng, nhập lại email khác";
                exit();
            }

            //kiểm tra tên đăng nhập đã có người dùng hay chưa?
            if($usermodel->checkDLN($name)){

                echo "tên này đã có người dùng, nhập lại tên khác";
                exit();
            }


            $result = $usermodel->addMember($name, $pass, $email, $group_id);
            if($result){
                $this->redirect("/home");
            }
            else{
                $this->redirect("/register");
            }
        }
        $this->loadView('register');
    }

    public function home(){
        $this->loadView('home');
    }
}



// namespace Controller;

// class UserController extends BaseController {
//     public static function user() {
//         if (self::check()) {
//             return $_SESSION['username'];
//         } else {
//             return FALSE;
//         }
//     }
//     public function login() {
//         if ($this->check()) {
//             $this->redirect('/');
//             return;
//         }
//         if (!empty($_POST ['username']) && !empty($_POST ['userpass'])) {
//             $host = "localhost"; // luôn luôn là localhost
//             $username = "root"; // user của mysql
//             $password = ""; // Mysql password
//             $db_name = "login"; // tên database
//             $tbl_name = "user"; // tên table
// // kết nối cơ sở dữ liệu
//             $conn = mysqli_connect($host, $username, $password, $db_name);
//             $myusername = $_POST['username'];
//             $mypassword = $_POST['userpass'];

// // Xử lý để tránh MySQL injection
//             $myusername = addslashes($myusername);
//             $mypassword = addslashes($mypassword);
            
            
//             $sql = "SELECT * FROM $tbl_name WHERE name='$myusername' and pass='$mypassword'";
//             $result = mysqli_query($conn, $sql);
//             $count = mysqli_num_rows($result);
// // nếu tài khoản trùng khớp thì sẽ trả về giá trị 1 cho biến $count
//             if ($count > 0) {
//                 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
//                     $_SESSION['flag'] = true;
//                     $_SESSION['username'] = $row['name'];
//                 }
//             }
//             else {
//     echo "Sai tên đăng nhập hoặc mật khẩu";
// }
//         }
// //        $this->redirect('/');
//     }

//     public function logout() {
//         session_unset();
//         setcookie("id", true, time() - 1800);
//         $this->redirect('/');
//         return;
//     }

//     public function hello() {
// //        if ($this->check()) {
//         $this->loadView('hello');
// //        } else {
// //            $this->redirect('/login');
// //        }
//     }

//     public static function check() {
//         if (isset($_SESSION['flag']) and $_SESSION['flag'] == true) {
//             return TRUE;
//         }
//         return FALSE;
//     }

// // public function loadView($view){
// //  require_once '../src/view/footer.php';
// // }
// }

// ?>