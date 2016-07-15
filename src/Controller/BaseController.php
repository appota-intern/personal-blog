<?php

 namespace Controller;

	abstract class BaseController{
		public function redirect($uri){
			header ( 'location:' . getenv('BASE_URI') . $uri);
		}
	}


?>