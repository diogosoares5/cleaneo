<?php 
	session_start();
	include('controller/projectController.php');
	include_once('controller/arquivoController.php');
	$projeto = new Projeto();
	if(isset($_POST['id_project'])):
		$pid = $_POST['id_project'];
		
		if($projeto->edit(array("status = '2' WHERE id = '".$pid."'")) == true):
			$_SESSION['flash'] = "Projeto enviado com sucesso!";
		else:
			$_SESSION['flash'] = "Falha ao enviar projeto, tente novamente mais tarde";
		endif;
	elseif(isset($_GET['pid'])):
		$pid = $_GET['pid'];
		if($projeto->edit(array("status = '3' WHERE id = '".$pid."'")) == true):
			$_SESSION['flash'] = "Projeto exclu&iacute;do com sucesso!";
		else:
			$_SESSION['flash'] = "Falha ao enviar projeto, tente novamente mais tarde";
		endif;
	else:
			$_SESSION['flash'] = "Projeto invalido!";
	endif;
	Site::redirect('projetos');
?>