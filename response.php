<?php
include('view/template.php'); 
include("controller/appController.php");
include("controller/customerController.php");
$customer = new Customer();
if(isset($_POST['type']) and $_POST['type'] == 'contact'):
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$ddd = $_POST['ddd_tel'];
	$tel = $_POST['tel'];
	$msg = $_POST['msg'];
	
	$body=  '<h2>Mensagem de contato Site Concurso Knauf Cleaneo</h2>
<p><b>Nome:</b>'.$nome.'</p>
<p><b>Email:</b>'.$email.'</p>
<p><b>Telefone:</b>'.$ddd.' '.$tel.'</p>
<p><b>Menagem:</b>'.$msg.'</p>';
	
	include_once("vendors/sendEmail/class.phpmailer.php");
	include_once("vendors/sendEmail/class.smtp.php");
	
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
				$mail->AddAddress("sak@knauf.com.br", "SAK Knauf");
				
				# Define os dados técnicos da Mensagem 
				$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
				
				
				
					# Texto e Assunto 
						$mail->Subject  = "Knauf Cleaneo Mensagem de contato"; // Assunto da mensagem
						$mail->Body = $body;
						
						$enviado = $mail->Send();
	if($enviado):
					$_SESSION['warn'] = "Sua mensagem foi enviada com sucesso!";
				else:
					$_SESSION['warn'] = "Erro ";
				endif;
				
				Site::redirect('contato');
endif;
if(isset($_POST['type']) and $_POST['type'] == 'forget'):
	$email = $_POST['email'];
	$check = $customer->forget($email);
	if($check==true):
		
		$send = $customer->sendEmail($customer->id,"esqueci-minha-senha");
		if($send==true):
		$_SESSION['warn1'] = "Enviamos sua nova senha em sua caixa de e-mail (".$customer->email."). Favor se necess&aacute;rio, verifique seu spam.";
		else:
		$_SESSION['warn'] = "Erro ao enviar senha";
		endif;
	else:  
		$_SESSION['warn'] = "E-mail n&atilde;o cadastrado no concurso!";
	endif;
	Site::redirect('esqueci-minha-senha');
endif;
if(isset($_POST['type']) and $_POST['type'] == 'forget_verify'):
	 $senha = $_POST['senha'];
	$id = $_POST['id_user'];
	$edit = $customer->Edit(array('senha="'.md5($senha).'" WHERE MD5(id) = "'.$id.'" '));
	if($edit==true):
		$_SESSION['warn'] = 'Senha alterada com sucesso!';
		Site::redirect('#erro');
		exit();
	else:
		$_SESSION['warn'] = "Erro ao alterar a senha";	
	endif;
Site::redirect('esqueci-minha-senha');
endif;
?>
