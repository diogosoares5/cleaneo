<?php
include('view/template.php'); 
require_once("controller/customerController.php");
Head('Bem vindo','','Home');

$customer = new Customer();


if(isset($_GET['email'])):
$email = $_GET['email'];
?>
<p>dqwdqw</p>
<a href="?send=true&email=<?php echo $email; ?>">Renviear</a>

<?php 
endif;


if(isset($_GET['send']) and $_GET['send']==true and isset($_GET['email'])):
	$lastUser = $customer->show(array("email = '".$email."'"));
	if(isset($lastUser['id'])):
		$send = $customer->sendEmail($lastUser['id'],'ativacao');
		if($send==true): 
			echo 'Enviamos'	;
		else:
			echo "Erro";
		endif;
	else:
		echo "Usuario nao existe";
	endif;

endif;
?>

<?php Footer(); ?>