<?php 
	require("../../config.php");
	include('class.upload.php');
	
	$error = "";
	$msg = "";
	$fileElementName = 'file-original1';
	$f = $_FILES['file-original1'];
	//$p = $_POST['project_id'];
//	$c = $_POST['customer_id'];
	
	
	$image = new Upload($f);
	$image->allowed = array('image/jpg');
	$image->Proccess(ROOT.'/archives');
	if($image->processed): 
		$msg = 'Imagem incluida com sucesso';
	else: 
		$error =  'Erro ao incluir imagem: '.$image->error; 
	endif;
	$image->file_name_body_pre  = 'thumb_'
	$image->image_resize          = true;
	$image->image_ratio_crop      = true;
	$image->image_y               = 112;
	$image->image_x               = 111;
	$image->processed;
?>