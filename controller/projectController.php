<?php 
	include_once("components/crud.php");
	include_once("appController.php");
	class Projeto{
		function check($id){
			$v = Crud::_read("projects",array('id = "'.$id.'"'));
			if($v): return true; else: return false; endif;
		}
		function create($id_costumer,$id_category,$id_pessoa,$nome,$cep,$endereco,$bairro,$cidade,$estado,$ddd_tel,$tel,$contato,$status){
			$c = Crud::_create("projects","NULL,'$id_costumer','$id_category','$id_pessoa','$nome','$cep','$endereco','$bairro','$cidade','$estado','$ddd_tel','$tel','$contato',$status");
			if($c): return true; else: return false; endif;
		}
		function Show($params=NULL){
			$c = Crud::_read("projects",$params);
			while( $res = mysql_fetch_array($c)){
				$projects[] = $res;	
			}
			return $projects;
		}
		function edit($params=NULL){
			$e = Crud::_update("projects",$params);
			if($e): return true; else: return false; endif;
		}
		function Delete(){
			
		}
		function Last(){
			$v = Crud::_order("projects","id","desc","1");
			$res = mysql_fetch_object($v);
			return $res;
		}
		function counter($id,$status=NULL){
			if(isset($status)):
			$n = Crud::_counter("projects",array('id_customer = "'.$id.'" and status = "'.$status.'" and status <> "3"'));
			else:
			$n = Crud::_counter("projects",array('id_customer = "'.$id.'" and status <> "3"'));
			endif;
			return $n;
		}
		function status($id, $status=NULL){
			$n = Crud::_read("projects",array('id = "'.$id.'" and status = "'.$status.'"'));
			$res = mysql_fetch_object($n);
			if(isset($res->id)): return true; else: return false; endif;
		}
		function getThumb($id){
			$q = Crud::_read("archives",array('id_project = "'.$id.'" and id_type = "1" ORDER BY id DESC LIMIT 1'));
			$t = mysql_fetch_array($q);
			
			return $t;
		}
		function getThumbs($id){
			$arr_thumb = NULL;
			$q = Crud::_read("archives",array('id_project = "'.$id.'" and id_type = "1" '));
			while($t = mysql_fetch_array($q)):
				$arr_thumb[] = $t;
			endwhile;
			return $arr_thumb;
		}
		function getFile($id,$type=NULL){
			$q = Crud::_read("archives",array('id_project = "'.$id.'" and id_type = "'.$type.'" '));
			$t = mysql_fetch_array($q);
			return $t;	
		}
	
		function maskNumber($id,$cat){
				if($cat=='1'){
					$num = '125.000.000.'.$id;
				}else{
					$num = '157.000.000.'.$id;
				}
				return $num;
		}
		function sendEmail($uid,$pid,$template=NULL){
				include_once("vendors/sendEmail/class.phpmailer.php");
				include_once("vendors/sendEmail/class.smtp.php");
				$project = $this->show(array("id='".$pid."'"));
				
				$u = Crud::_read("customers",array('id = "'.$uid.'" '));
				$user = mysql_fetch_array($u);
				
				$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

				$mail->IsSMTP(); // telling the class to use SMTP
				
				$mail->SMTPAuth   = true;                  // enable SMTP authentication
				$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
				$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
				$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
				$mail->Username   = "knaufcleaneo@gmail.com";  // GMAIL username
				$mail->Password   = "concursocleaneo";            // GMAIL password

				#Define o remetente 
				$mail->SetFrom("knaufcleaneo@gmail.com", "Knauf");

				
				$mail->CharSet = 'utf-8';
				
				#Define o remetente 
				
				
				
				# Define os destinatário(s) 
				$mail->AddAddress($user['email'], $user['nome']);
				
				# Define os dados técnicos da Mensagem 
				$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
				
			if($template =='envio-projeto'):
				include("vendors/sendEmail/email_envio.php");
					# Texto e Assunto 
						$mail->Subject  = "Envio de projeto sucedido!"; // Assunto da mensagem
						$mail->Body = $body;
						
						$enviado = $mail->Send();
				endif;
				if($template == 'esc-projeto'):
				include("vendors/sendEmail/email_esc.php");
					# Texto e Assunto 
						$mail->Subject  = "Exclusão de projeto confirmado"; // Assunto da mensagem
						$mail->Body = $body;
						
						$enviado = $mail->Send();
				
				endif;
				if($enviado): return true; else: return false; endif;
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