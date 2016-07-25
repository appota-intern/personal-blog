<?php

namespace Controller;

class UserController extends BaseController {

    public static function user() {
        if (self::check()) {
            return $_SESSION['username'];
        } else {
            return FALSE;
        }
    }

    public function login() {
        if ($this->check()) {
            $this->redirect('/');
            return;
        }
        if (!empty($_POST ['myusername']) && !empty($_POST ['mypassword'])) {
            $tbl_name = "myuser"; // tên table
// kết nối cơ sở dữ liệu
            $conn = mysqli_connect(getenv('HOST'), getenv('USER_NAME'), getenv('PASSWORD'), getenv('DB_NAME'));
            $myusername = $_POST['myusername'];
            $mypassword = $_POST['mypassword'];

// Xử lý để tránh MySQL injection
            $myusername = addslashes($myusername);
            $mypassword = addslashes($mypassword);


            $sql = "SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
// nếu tài khoản trùng khớp thì sẽ trả về giá trị 1 cho biến $count
            if ($count > 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $_SESSION['flag'] = true;
                    $_SESSION['username'] = $row['username'];
                }
            } else {
//                echo "Sai tên đăng nhập hoặc mật khẩu";
            }
        }
        $this->redirect('/');
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
