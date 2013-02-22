<?php
	class Site{
		function redirect($page){
			header('Location:'.ROOT.'/'.$page);	
		}	
	}
?>