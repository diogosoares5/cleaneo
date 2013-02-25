<?php 
	include_once("components/crud.php");
	include_once("appController.php");
	class Arquivo{
		function create($id_type,$id_customer,$id_project,$data,$date){
			$q = Crud::_create("archives","NULL,'$id_type','$id_customer','$id_project','$data','$date'");	
			if($q): return true; else: return false; endif;
		}	
	}
?>