<?php 
	require('config.php');
	include_once("controller/arquivoController.php");
	include_once("controller/projectController.php");
	
	$projeto = new Projeto();
	$arquivo = new Arquivo();
	
	if(isset($_REQUEST['tid'])):
		$tid = $_REQUEST['tid'];
		if($arquivo->delete($tid)==true):
			echo "Excluido com sucesso";
			$t = $projeto->getThumb($tid);
			@unlink('archives/'.$t['data']);
			@unlink('archives/thumbs'.$t['data']);
		else:
			echo "Erro ao excluir arquivo";
		endif;	
	endif;
	
?>