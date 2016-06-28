<<<<<<< HEAD
<?php

if (isset($_POST['form_click'])) {
    if (isset($_POST['inputtext']) && $_POST['inputtext'] != '') {
        echo 'Xin Chao:' . $_POST['inputtext'];
    }
}
=======
<?php 
			if(isset($_POST['submit'])){
				if(isset($_POST['name']) && $_POST['name'] != ""){
					echo "<p> Hello " .$_POST['name']."</p>";
				}
			}
>>>>>>> 4777580fca9e103e8efbe96e65db1c7ea10d3323
?>