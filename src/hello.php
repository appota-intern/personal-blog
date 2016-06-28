<?php 
			if(isset($_POST['submit'])){
				if(isset($_POST['name']) && $_POST['name'] != ""){
					echo "<p> Hello " .$_POST['name']."</p>";
				}
			}
?>