<?php 
include('view/template.php'); 
Head('Fale Conosco','','faleConosco');
$pageVerified = false;
if(isset($_GET['id'])):
	$uid = substr($_GET['id'],0,32);
	
	$q = mysql_query('SELECT * FROM customers WHERE MD5(id)="'.$uid.'" and valido = "1"');
	$u = mysql_fetch_object($q);
	//echo $u->nome;
	$pageVerified = true;
endif;
?>

<div class="top"><img src="<?php echo ROOT; ?>/assets/images/topBar.png" alt="" title="" width="551" height="23" /></div>
<div class="title"><img src="<?php echo ROOT; ?>/assets/images/txt_novaSenha.png" width="353" height="32" alt="" title="" /></div>
<div class="top"><img src="<?php echo ROOT; ?>/assets/images/bar2.png" alt="" title="" width="551" height="2" /></div>
<?php 
	if($pageVerified == true):
		 if(isset($_SESSION['warn1'])):
	echo '<span class="infoBar">'.$_SESSION['warn1'].'</span>';
	unset($_SESSION['warn1']);
	else:
	?>
<form action="<?php echo ROOT; ?>/response" method="post" id="forgetFormPass" class="form">
  <span class="infoBar">
  <?php 
    if(isset($_SESSION['warn'])):
	echo $_SESSION['warn'];
	unset($_SESSION['warn']);
else:
?>
  <b>Esqueceu sua senha?</b> Não tem problema.
  <?php endif; ?>
  </span> <span class="lbl">
  <input type="hidden" name="type" value="forget_verify">
  <input type="hidden" name="id_user" value="<?php echo $uid; ?>">
  <label>Coloque sua nova senha:</label>
  <input type="password"   name="senha"  id="senha" class="inpt05" /><br><br>

  <label>Confirme sua nova senha:</label>
  <input type="password"  name="resenha"  id="resenha" class="inpt05" />
  </span>
  <input type="submit" value="" name="" id="" class="btEnviar rt" />
</form>
<?php endif; 
	
	else:
    if(isset($_SESSION['warn1'])):
	echo '<span class="infoBar">'.$_SESSION['warn1'].'</span>';
	unset($_SESSION['warn1']);
	else:
	?>
<form action="<?php echo ROOT; ?>/response" method="post" id="forgetForm" class="form">
  <span class="infoBar">
  <?php 
    if(isset($_SESSION['warn'])):
	echo $_SESSION['warn'];
	unset($_SESSION['warn']);
else:
?>
  <b>Esqueceu sua senha?</b> Não tem problema.
  <?php endif; ?>
  </span> <span class="lbl">
  <input type="hidden" name="type" value="forget">
  <label>Digite seu e-mail:</label>
  <input type="text"  name="email"  id="email" class="inpt05" />
  </span>
  <input type="submit" value="" name="" id="" class="btEnviar rt" />
</form>
<?php endif; endif; ?>
<?php Footer(); ?>
