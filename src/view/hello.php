<?php
require_once '../src/view/header.php';

echo 'hello ' . $_SESSION['username'] . '! ';
?>

<a href="logout">Logout</a>


<?php
require_once '../src/view/footer.php';
?>