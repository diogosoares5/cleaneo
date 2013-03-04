<?php
include('view/template.php'); 
require_once("controller/customerController.php");
Head('Bem vindo','','Reenvio');

$customer = new Customer();


if(isset($_GET['email']) and !isset($_GET['send'])):
$email = $_GET['email'];
?>
<div class="top"><img src="<?php echo ROOT; ?>/assets/images/topBar.png" alt="" title="" width="551" height="23" /></div>
<div class="title"><img src="<?php echo ROOT; ?>/assets/images/txt_naoAtivado.png" width="480" height="26" alt="" title="" /></div>
<div class="top"><img src="<?php echo ROOT; ?>/assets/images/bar2.png" alt="" title="" width="551" height="2" /></div>
<p class="text">Verifique sua conta de e-mail <span><?php echo $email; ?></span> <b>e<br /> faça a ativação do seu cadastro ou solicite o reenvio <br />da ativação para esse e-mail.</b></p>
			<a href="?send=true&email=<?php echo $email; ?>" class="btEnviar2"></a>
			<span class="infoBar">Após ativar o cadastro, <b>você deverá aceitar as condições do regulamento</b> para iniciar sua participação com o envio dos seus projetos.</span>


<?php 
endif;


if(isset($_GET['send']) and $_GET['send']==true and isset($_GET['email'])):
$email = $_GET['email'];
?>
<div class="top"><img src="<?php echo ROOT; ?>/assets/images/topBar.png" alt="" title="" width="551" height="23" /></div>
<div class="title"><img src="<?php echo ROOT; ?>/assets/images/txt_reenviado.png" width="480" height="26" alt="" title="" /></div>
<div class="top"><img src="<?php echo ROOT; ?>/assets/images/bar2.png" alt="" title="" width="551" height="2" /></div>
<?php 
	$lastUser = $customer->show(array("email = '".$email."'"));
	if(isset($lastUser['id'])):
		$send = $customer->sendEmail($lastUser['id'],'ativacao');
		if($send==true): 
		?>
        <p class="text">Verifique sua conta de e-mail <span><?php echo $email; ?></span> <b>e<br /> faça a ativação do seu e-mail.</b></p>
			<span class="infoBar">Após ativar o cadastro, <b>você deverá aceitar as condições do regulamento</b> para iniciar sua participação com o envio dos seus projetos.</span>
        <?php 	
		else:
			echo "Erro ao enviar e-mail tente novamente mais tarde.";
		endif;
	else:
		echo "Usuario nao existe!";
	endif;

endif;
?>

<?php Footer(); ?>