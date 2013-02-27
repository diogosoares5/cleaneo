<?php
include('view/template.php'); 
include("controller/appController.php");
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
				$mail->AddAddress("herculano@dizain.com.br", "Herculano");
				
				# Define os dados técnicos da Mensagem 
				$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
				
				
				
					# Texto e Assunto 
						$mail->Subject  = "Knauf Cleaneo"; // Assunto da mensagem
						$mail->Body = $body;
						
						$enviado = $mail->Send();
	if($enviado):
					$_SESSION['warn'] = "Sua mensagem foi enviada com sucesso!";
				else:
					$_SESSION['warn'] = "Erro ";
				endif;
				
				Site::redirect('contato');
?>
