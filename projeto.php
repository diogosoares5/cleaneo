<?php
session_start();
	include('controller/projectController.php');
	include_once('controller/arquivoController.php');
	
	//dados do projeto
	$nome = $_POST['nome'];
	$cep = $_POST['cep'];
	$endereco = $_POST['endereco'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$ddd_tel = $_POST['ddd_tel'];
	$tel = $_POST['tel'];
	$contato = $_POST['contato'];
	
	//arquivos
	$img1 = $_FILES['fileOriginal1'];
	$img2 = $_FILES['fileOriginal2'];
	$img3 = $_FILES['fileOriginal3'];

	$desc = $_FILES['fileOriginal4'];
	
	$auto = $_FILES['fileOriginal5'];
	
	//ids
	if(isset($_POST['id_customer'])):
		$id_customer = $_POST['id_customer'];
	else:
		$id_customer = NULL;
	endif;
	$id_category = $_POST['id_category'];
	$id_pessoa = $_POST['id_pessoa'];
	
	if(isset($_POST['id_project'])):
		$id_project = $_POST['id_project'];
	else:
		$id_project = NULL;
	endif;
	$projeto = new Projeto();
	$arquivos = new Arquivo();
	
	if(isset($id_project) and $projeto->check($id_project)==true):
		//edita
		$save = $projeto->edit(array("nome = '$nome', cep = '$cep',endereco='$endereco',bairro = '$bairro',cidade='$cidade',estado='$estado',ddd_tel = '$ddd_tel',tel = '$tel',contato='$contato' WHERE id='$id_project'"));
		
		include_once("vendors/uploads/class.upload.php");
		$error1 = "";
		$error2 = "";
		$error3 = "";
		$error4 = "";
		$error5 = "";
		$msg = "";
		include_once("vendors/uploads/upload.php");
		
		if(!$error1): $save_img1 = $arquivos->create('1',$id_customer,$id_project,$image1->file_dst_name,time()); endif;
		if(!$error2): $save_img2 = $arquivos->create('1',$id_customer,$id_project,$image2->file_dst_name,time()); endif;
		if(!$error3): $save_img3 = $arquivos->create('1',$id_customer,$id_project,$image3->file_dst_name,time()); endif;
		if(!$error4): $save_desc = $arquivos->create('2',$id_customer,$id_project,$desc['name'],time()); endif;
		if(!$error5): $save_auto = $arquivos->create('3',$id_customer,$id_project,$auto['name'],time()); endif;
	else:
		//cadastra

		$save = $projeto->create($id_customer,$id_category,$id_pessoa,$nome,$cep,$endereco,$bairro,$cidade,$estado,$ddd_tel,$tel,$contato,'1');
		$projeto_last = $projeto->Last();
		
		include_once("vendors/uploads/class.upload.php");
		$error1 = "";
		$error2 = "";
		$error3 = "";
		$error4 = "";
		$error5 = "";
		$msg = "";
		include_once("vendors/uploads/upload.php");
		
		if(!$error1): $save_img1 = $arquivos->create('1',$id_customer,$projeto_last->id,$image1->file_dst_name,time()); endif;
		if(!$error2): $save_img2 = $arquivos->create('1',$id_customer,$projeto_last->id,$image2->file_dst_name,time()); endif;
		if(!$error3): $save_img3 = $arquivos->create('1',$id_customer,$projeto_last->id,$image3->file_dst_name,time()); endif;
		if(!$error4): $save_desc = $arquivos->create('2',$id_customer,$projeto_last->id,$desc['name'],time()); endif;
		if(!$error5): $save_auto = $arquivos->create('3',$id_customer,$projeto_last->id,$auto['name'],time()); endif;
	endif;
	if($save == true):
			$_SESSION['flash'] = '<b class="b1">Seu projeto foi salvo com sucesso!</b><br>Para finalizar o processo de participa&ccedil;&atilde;o desse projeto voc&ecirc; precisa clicar em ENVIAR projeto. Ap&oacute;s o envio desse projeto, voc&ecirc; N&Aacute;O poder&aacute; edit&aacute;-lo, apenas exclu&iacute;-lo.';
			$c = $projeto->counter($id_customer);
			if($c=='1'): $_SESSION['flash'] .=' Voc&ecirc; ainda pode adicionar mais 2 projetos!'; endif;
			if($c=='2'): $_SESSION['flash'] .=' Voc&ecirc; ainda pode adicionar mais 1 projeto!'; endif;
	else:
			$_SESSION['flash'] = "Falha ao criar/editar projeto favor tente mais tarde";
	endif;
	echo $_SESSION['flash'];
	Site::redirect('projetos');
?>