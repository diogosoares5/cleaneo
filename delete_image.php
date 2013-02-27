<?php 
	session_start();
	require('config.php');
	include_once("controller/arquivoController.php");
	include_once("controller/projectController.php");
	
	$projeto = new Projeto();
	$arquivo = new Arquivo();
	
	if(isset($_REQUEST['tid'])):
		$tid = $_REQUEST['tid'];
		if($arquivo->delete($tid)==true):
			$_SESSION['flash'] =  "Arquivo excluido com sucesso do projeto ".$projeto->nome;
			$t = $projeto->getThumb($tid);
			@unlink('archives/'.$t['data']);
			@unlink('archives/thumbs'.$t['data']);
		else:
			$_SESSION['flash'] =  "Erro ao excluir arquivo do projeto ".$projeto->nome;
		endif;	
	else:
	$_SESSION['flash'] =  "Arquivo invalido";
	endif;
	Site::redirect('projetos');
?>