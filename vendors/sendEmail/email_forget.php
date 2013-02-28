<?php
	$hashing = uniqid(rand());
	$body='<b>Reenvio de senha</b><br/>
		<p>Clique no link abaixo para resgatar sua senha <a href="'.ROOT.'/esqueci-minha-senha/'.md5($user['id']).$hashing.'">'.ROOT.'/esqueci-minha-senha/'.md5($user['id']).$hashing.'</a></p>
	';
?>