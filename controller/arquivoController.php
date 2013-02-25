<?php 
	include_once("components/crud.php");
	include_once("appController.php");
	class Arquivo{
		function create($id_type,$id_customer,$id_project,$data,$date){
			$q = Crud::_create("archives","NULL,'$id_type','$id_customer','$id_project','$data','$date'");	
			if($q): return true; else: return false; endif;
		}	
		function delete($id){
			$q = Crud::_delete("archives",array("id = '".$id."'"));
			if($q): return true; else: return false; endif;
		}
		function serial($arr, $char=NULL){
			if(isset($char)):
			$r = implode($char,$arr);
			else:
			$r = implode(' ',$arr);
			endif;
			return $r;
		}
	}
?>