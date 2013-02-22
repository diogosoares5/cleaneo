<?php 
	require("../../config.php");
	include('class.upload.php');
	
	$f = $_FILES['file'];
	$p = $_POST['project_id'];
	$c = $_POST['customer_id'];
	
	
	$image = new Upload($f);
	$image->allowed = array('image/jpg');
	$image->Proccess('../../archives');
	if($image->processed): 
		echo 'Imagem incluida com sucesso';
	else: 
		echo 'Erro ao incluir imagem: '.$image->error; 
	endif;
	$image->file_name_body_pre  = 'thumb_'
	$image->image_resize          = true;
	$image->image_ratio_crop      = true;
	$image->image_y               = 112;
	$image->image_x               = 111;
	$image->processed;
?>