<?php

$host = "localhost"; // luôn luôn là localhost
$username = "root"; // user của mysql
$password = "12344321"; // Mysql password
$db_name = "data"; // tên database
$tbl_name = "myuser"; // tên table
// kết nối cơ sở dữ liệu
$conn = mysqli_connect($host, $username, $password, $db_name);
//mysql_connect("$host", "$username", "$password")or die("Không thể kết nối");
//mysql_select_db("$db_name")or die("cannot select DB");

// username và password được gửi từ form đăng nhập
$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];

// Xử lý để tránh MySQL injection
$myusername = addslashes($myusername);
$mypassword = addslashes($mypassword);

$sql = "SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
echo $sql;
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);
// nếu tài khoản trùng khớp thì sẽ trả về giá trị 1 cho biến $count
if ($count > 0) {
    echo 'dang nhap thanh cong';
    while ($row=  mysqli_fetch_array($result,MYSQLI_ASSOC)){
        print_r($row);
    }
//// Lúc này nó sẽ tự động gửi đến trang thông báo đăng nhập thành công
//    session_register("myusername");
//    session_register("mypassword");
//    header("location:login_success.php");
} else {
    echo "Sai tên đăng nhập hoặc mật khẩu";
}
?>