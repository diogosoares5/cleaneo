<?php 
	include('controller/projetoController.php');
	
	//dados do projeto
	$nome = $_POST['nome'];
	$cep = $_POST['cep'];
	$endereco = $_POST['endereco'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$tel = $_POST['tel'];
	$contato = $_POST['contato'];
	
	//arquivos
	$img1 = $_POST['img1'];
	$img2 = $_POST['img2'];
	$img3 = $_POST['img3'];
	
	$desc = $_POST['desc'];
	
	$auto = $_POST['auto'];
	
	
	$projeto = new Projeto();
	if($projeto->check()==false):
		$_SESSION['flash'] = "Este projeto ja foi criado";
	else:
		$save = $projeto->create($nome,$cep,$endereco,$bairro,$cidade,$estado,$tel,$contato);
		
		$arquivos = new Arquivo();
		$save_files = $arquivos->upload(array($img1,$img2,$img3,$desc,$auto),$projeto->id);
		
		if($save == true):
			$_SESSION['flash'] = '<b class="b1">Seu projeto foi salvo com sucesso!</b><br>Para finalizar o processo de participação desse projeto você precisa clicar em ENVIAR projeto. Após o envio desse projeto, você NÃO poderá editá-lo, apenas excluí-lo.';
			$c = $projeto->counter($id_customer);
			if($c==1): $_SESSION['flash'] .=' Você ainda pode adicionar mais 2 projetos!'; endif;
			if($c==2): $_SESSION['flash'] .=' Você ainda pode adicionar mais 1 projeto!'; endif;
		else:
			$_SESSION['flash'] = "Falha ao criar projeto favor tente mais tarde";
		endif;
	endif;
	Site::redirect('projetos');
?>