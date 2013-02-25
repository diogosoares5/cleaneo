<?php 
	//image 1
	$image1 = new Upload($img1);
	$image1->allowed = array('image/jpeg','image/jpg');
	$image1->process('archives');
	if($image1->processed): 
		$msg = 'Imagem 1 incluida com sucesso';
	else: 
		$error1 =  'Erro ao incluir imagem 1: '.$image1->error; 
	endif;
	
	$image1->image_resize          = true;
	$image1->image_ratio_crop      = true;
	$image1->image_y               = 112;
	$image1->image_x               = 111;
	$image1->process('archives/thumbs');
	$image1->processed;
	
	
	//image 2
	$image2 = new Upload($img2);
	$image2->allowed = array('image/jpeg','image/jpg');
	$image2->process('archives');
	if($image2->processed): 
		$msg .= 'Imagem 2 incluida com sucesso';
	else: 
		$error2 =  'Erro ao incluir imagem 2: '.$image2->error; 
	endif;
	
	$image2->image_resize          = true;
	$image2->image_ratio_crop      = true;
	$image2->image_y               = 112;
	$image2->image_x               = 111;
	$image2->process('archives/thumbs');
	$image2->processed;
	
	//image 3
	$image3 = new Upload($img3);
	$image3->allowed = array('image/jpeg','image/jpg');
	$image3->process('archives');
	if($image3->processed): 
		$msg .= 'Imagem 3 incluida com sucesso';
	else: 
		$error3 =  'Erro ao incluir imagem 3: '.$image3->error; 
	endif;
	
	$image3->image_resize          = true;
	$image3->image_ratio_crop      = true;
	$image3->image_y               = 112;
	$image3->image_x               = 111;
	$image3->process('archives/thumbs');
	$image3->processed;
	
	//pdf
		if(strpos($desc['name'],'.pdf')):
			$move = move_uploaded_file($desc['tmp_name'], 'archives/'.$desc['name']);		
			if($move):
				$msg .= 'Descritivo incluido com sucesso';
			else:
				$error4 =  'Erro ao incluir descritivo ';
			endif;
		else:
				$error4 =  'Somente PDF';
		endif;
	//doc
	if(strpos($auto['name'],'.doc') or strpos($auto['name'],'.docx')):
			$move = move_uploaded_file($auto['tmp_name'], 'archives/'.$auto['name']);		
			if($move):
				$msg .= 'Modelo incluido com sucesso';
			else:
				$error5 =  'Erro ao incluir modelo ';
			endif;
		else:
				$error5 =  'Somente PDF';
		endif;
		
?>