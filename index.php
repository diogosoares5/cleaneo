<?php
include('view/template.php'); 
Head('Bem vindo','','Home');
if(isset($_SESSION['user_site'])): header('Location:'.ROOT.'/projetos'); endif;
?>

<div class="top"><img src="<?php echo ROOT; ?>/assets/images/topBar.png" alt="" title="" width="551" height="23" /></div>
<div class="title"><img src="<?php echo ROOT; ?>/assets/images/txt_escreva.png" width="550" height="82" alt="" title="" /></div>
<div class="top"><img src="<?php echo ROOT; ?>/assets/images/bar2.png" alt="" title="" width="551" height="2" /></div>

<img class="txt" src="<?php echo ROOT; ?>/assets/images/txt_knaufBrasil.png" alt="" title="" width="551" height="85" /> <img class="txt" src="<?php echo ROOT; ?>/assets/images/txt_concursoDestinado.png" alt="" title="" width="551" height="93" /> <img class="txt" src="<?php echo ROOT; ?>/assets/images/txt_todosProf.png" alt="" title="" width="551" height="70" /> <img class="txt" src="<?php echo ROOT; ?>/assets/images/txt_naofique.png" alt="" title="" width="551" height="48" /> <a href="<?php echo HHtml::Link('cadastro'); ?>" class="link"><img src="<?php echo ROOT; ?>/assets/images/btCliqueePart.png" alt="" title="" width="551" height="54" /></a> <a href="<?php echo ROOT; ?>/regulamento" class="link2"><img src="<?php echo ROOT; ?>/assets/images/seta4.png" alt="" title="" width="9" height="11" /> Ver regulamento</a>
<hr class="bdr2 clr" />
<form class="form" action="<?php echo ROOT; ?>/login" method="post">
  <div class="Boxer">
    <h2 class="title"><img src="<?php echo ROOT; ?>/assets/images/btJacadastro.png" alt="" title="" width="200" height="31" /></h2>
    <span class="lbl lf">
    <label>E-mail:</label>
    <input type="text" name="login"  id="login" class="inpt04" />
    </span> <span class="lbl lf">
    <label>Senha: </label>
    <input type="password" name="pass"  id="pass" class="inpt04" />
    <input type="submit" id="loginBt" class="btEntrar inpt0" value="" />
    <span class="link_ipt"><a href="<?php echo ROOT; ?>/esqueci-minha-senha"><img src="<?php echo ROOT; ?>/assets/images/seta4.png" alt="" title="" width="9" height="11" /> Esqueci minha senha</a></span> </span>
    <div id="erro">
      <?php 
	if(isset($_SESSION['warn'])):
		echo $_SESSION['warn'];
		unset($_SESSION['warn']);
	endif;
?>
    </div>
  </div>
</form>
<?php Footer(); ?>
