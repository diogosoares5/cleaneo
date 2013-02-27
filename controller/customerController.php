<?php 
	include_once("components/crud.php");
	include_once("appController.php");
	class Customer extends Crud {
		var $nome;
		var $email;
		var $id;
		var $pessoa;
		var $category;
		
		function authUser($email, $pass, $valid=NULL){
			if(isset($valid)):
			$q = Crud::_read('customers',array('email="'.mysql_real_escape_string($email).'" and senha = "'.md5($pass).'" and valido="1" '));	
			else:
			$q = Crud::_read('customers',array('email="'.mysql_real_escape_string($email).'" and senha = "'.md5($pass).'" '));	
			endif;
			
			$u = mysql_fetch_object($q);
			if(isset($u->id)):
				return true;	
			else:
				return false;
			endif;
		}
		function authUserHash($id,$hash){
			$q = Crud::_read('customers',array('MD5(id)="'.$id.'" and hash = "'.$hash.'" and valido = "0" '));
			$u = mysql_fetch_object($q);
			if(isset($u->id)):
				Crud::_update('customers',array('valido = "1"'));
				$_SESSION['customer'] = $u->id;
				Site::redirect('projetos');
			else:
				Site::redirect('');
			endif;
		}
		//function getByID($id){}
		function login($email, $pass){
			
			if($this->authUser($email, $pass, '1') == true):
				$q = Crud::_read('customers',array('email="'.mysql_real_escape_string($email).'" and senha = "'.md5($pass).'" '));
				$u = mysql_fetch_object($q);
				$_SESSION['customer'] = $u->id;
				Site::redirect('projetos');
			elseif($this->authUser($email, $pass) == true):
				$_SESSION['warn'] = "Voce ainda nao ativou seu cadastro por favor ative seu cadastro";
				Site::redirect('');
			else:
				$_SESSION['warn'] = "Login ou senha incorretos";
				Site::redirect('');
			endif;
		}
		function logout(){
			session_destroy();	
			Site::redirect('');
		}
		function checkAuth(){
			if(isset($_SESSION['customer'])):
				return $_SESSION['customer']; 
			else: 
				Site::redirect(''); 
			endif;
		}	
		function set($id){
			$q = Crud::_read('customers',array('id="'.$id.'"'));
			$u = mysql_fetch_object($q);
			$this->id = $u->id;
			$this->nome = $u->nome;
			$this->email = $u->email;
			$this->category = $u->id_category;
			$this->pessoa = $u->id_pessoa;
		}
		function sign($categoria, $pessoa, $email, $senha, $nome, $cpf, $profissao, $cep, $endereco, $complemento, $bairro, $cidade, $estado, $ddd_tel, $tel, $ddd_cel,$cel, $razao, $fantasia, $cnpj){
			$senha = md5($senha);
			$hash = uniqid(rand());
			
			$create = Crud::_create("customers","'NULL','$categoria','$pessoa','$email','$profissao','$cpf','$senha','$nome','$cep','$endereco','$complemento','$bairro','$cidade','$estado','$ddd_tel','$tel','$ddd_cel','$cel','$razao','$fantasia','$cnpj','$hash','0'");
			if($create):
				return true;
			else:
				return false;
			endif;
		}
		function Edit($params){
			$edit = Crud::_update("customers",$params);
			if($edit): return true; else: return false; endif;
		}
		function show($params){
			$read = Crud::_read("customers",$params);
			$user = mysql_fetch_array($read);
			return $user;
		}
		function sendEmail($uid,$template=NULL){
				include_once("vendors/sendEmail/class.phpmailer.php");
				include_once("vendors/sendEmail/class.smtp.php");
				$user = $this->show(array("id='".$uid."'"));
				
				$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

				$mail->IsSMTP(); // telling the class to use SMTP
				
				$mail->SMTPAuth   = true;                  // enable SMTP authentication
				//$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
				$mail->Host       = "mail.outershoes.com.br";      // sets GMAIL as the SMTP server
				$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
				$mail->Username   = "noreply@outershoes.com.br";  // GMAIL username
				$mail->Password   = "OutShoes$123";            // GMAIL password

#Define o remetente 
$mail->SetFrom("noreply@outershoes.com.br", "teste");

				
				$mail->CharSet = 'utf-8';
				
				#Define o remetente 
				
				
				
				# Define os destinatário(s) 
				$mail->AddAddress($user['email'], $user['nome']);
				
				# Define os dados técnicos da Mensagem 
				$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
				
				
				echo $user[0]['email'];
				if($template == 'ativacao'):
					include("vendors/sendEmail/email_validacao.php");
					
					# Texto e Assunto 
						$mail->Subject  = "Ativacao"; // Assunto da mensagem
						$mail->Body = $body;
						
						$enviado = $mail->Send();
				endif;
				if($enviado): return true; else: return false; endif;
		}
		function getCategory($catid){
			if($catid == '1'):return "Arquiteto"; else: return "Instalador"; endif;	
		}
		function getField($field){
			$res = NULL;
			$q = Crud::_read('customers',array('id = "'.$this->id.'" '));
			$res = mysql_fetch_object($q);
			return $res->$field;
		}
	}
?>