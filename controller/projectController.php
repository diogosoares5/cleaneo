<?php 
	include_once("components/crud.php");
	include_once("appController.php");
	class Projeto{
		function check($id){
			$v = Crud::_read("projects",array('id = "'.$id.'"'));
			if($v): return true; else: return false; endif;
		}
		function create($id_costumer,$id_category,$id_pessoa,$nome,$cep,$endereco,$bairro,$cidade,$estado,$tel,$contato,$status){
			$c = Crud::_create("projects","NULL,'$id_costumer','$id_category','$id_pessoa','$nome','$cep','$endereco','$bairro','$cidade','$estado','$tel','$contato',$status");
			if($c): return true; else: return false; endif;
		}
		function Show($params=NULL){
			$c = Crud::_read("projects",$params);
			$projects[] = mysql_fetch_array($c);
			return $projects;
		}
		function edit(){
			//$e = Crud::_update("projects",array)
		}
		function Delete(){
			
		}
		function Last(){
			$v = Crud::_order("projects","id","desc","1");
			$res = mysql_fetch_object($v);
			return $res;
		}
		function counter($id){
			$n = Crud::_counter("projects",array('id_customer = "'.$id.'"'));
			return $n;
		}
		function getThumb($id){
			$q = Crud::_read("archives",array('id_project = "'.$id.'" ORDER BY id DESC LIMIT 1'));
			$t = mysql_fetch_array($q);
			return $t;
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