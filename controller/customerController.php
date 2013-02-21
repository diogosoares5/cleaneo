<?php 
	include_once("components/crud.php");
	class Customer extends Crud {
		function authUser($email, $pass, $valid=NULL){
			if(isset($valid)):
			$q = Crud::_read('customers',array('email="'.$email.'" and senha = "'.$pass.'" and valido="1" '));	
			else:
			$q = Crud::_read('customers',array('email="'.$email.'" and senha = "'.$pass.'" '));	
			endif;
			
			$u = mysql_fetch_object($q);
			if(isset($u->id)):
				return true;	
			else:
				return false;
			endif;
		}
		
		function auth($email,$pass){
			
		}	
		function sign($categoria, $pessoa, $email, $senha, $nome, $cpf, $profissao, $cep, $endereco, $complemento, $bairro, $cidade, $estado, $tel, $cel, $razao, $fantasia, $cnpj){
			$senha = md5($senha);
			$hash = uniqid(rand());
			
			$create = Crud::_create("customers","'NULL','$categoria','$pessoa','$email','$cpf','$senha','$nome','$cep','$endereco','$complemento','$bairro','$cidade','$estado','$tel','$cel','$razao','$fantasia','$cnpj','$hash','0'");
			if($create):
				return true;
			else:
				return false;
			endif;
		}
		function show($params){
			$read = Crud::_read("customers",$params);
			$user = mysql_fetch_array($read);
			return $user;
		}
		function sendEmail($uid,$template){
				include_once("vendors/sendEmail/class.phpmailer.php");
				include_once("vendors/sendEmail/class.smtp.php");
				$user_grabbed = $this->show(array("id='".$uid."'"));
				if($template == 'ativacao'):
					include("vendors/sendEmail/email_validacao.php");
				endif;
				
		}
	}
?>