<?php
include('view/template.php'); 
Head('Bem vindo','','Home');
if(isset($_SESSION['customer'])): header('Location:'.ROOT.'/projetos'); endif;
?>
            <div class="top"><img src="<?php echo ROOT; ?>/assets/images/topBar.png" alt="" title="" width="551" height="23" /></div>
            <div class="title"><img src="<?php echo ROOT; ?>/assets/images/txt_escreva.png" width="550" height="82" alt="" title="" /></div>
			<div class="top"><img src="<?php echo ROOT; ?>/assets/images/bar2.png" alt="" title="" width="551" height="2" /></div>
			

			<div class="infoBar">Todos os profissionais que usaram Knauf Cleaneo em seus projetos e obras podem participar. E os vencedores conhecerão a fábrica da Knauf na Alemanha e as maiores inovações no mundo do Drywall.</div>				
			
			<img class="txt" src="<?php echo ROOT; ?>/assets/images/txt_knaufBrasil.png" alt="" title="" width="551" height="85" />
			<img class="txt" src="<?php echo ROOT; ?>/assets/images/txt_concursoDestinado.png" alt="" title="" width="551" height="93" />
			<img class="txt" src="<?php echo ROOT; ?>/assets/images/txt_todosProf.png" alt="" title="" width="551" height="70" />
			<img class="txt" src="<?php echo ROOT; ?>/assets/images/txt_naofique.png" alt="" title="" width="551" height="39" />
			<a href="<?php echo HHtml::Link('cadastro'); ?>" class="link"><img src="<?php echo ROOT; ?>/assets/images/btCliqueePart.png" alt="" title="" width="551" height="54" /></a>
			<a href="regulamento.php" class="link2"><img src="<?php echo ROOT; ?>/assets/images/seta4.png" alt="" title="" width="9" height="11" /> Ver regulamento</a>
			<hr class="bdr2 clr" />	

			<form class="form" action="<?php echo ROOT; ?>/login" method="post">
				<div class="Boxer">
					<h2 class="title"><img src="<?php echo ROOT; ?>/assets/images/btJacadastro.png" alt="" title="" width="200" height="31" /></h2>
					<span class="lbl lf">
						<label>E-mail:</label>
						<input type="text" name="login"  id="" class="inpt04" />
						<span class="error none"><b>X</b> Favor digitar bla bla bla</span>
					</span>	
					<span class="lbl rt">
						<label>Senha: </label>
						<input type="password" name="pass"  id="" class="inpt04" />
                        <input type="submit" class="btEntrar inpt0" value="LOGAR">
						<span class="link_ipt"><a href="#"><img src="<?php echo ROOT; ?>/assets/images/seta4.png" alt="" title="" width="9" height="11" /> Esqueci minha senha</a></span>
						<span class="error none"><b>X</b> Favor digitar bla bla bla.</span>
					</span>
				</div>
			</form>
<!--<a href="<?php echo HHtml::Link('cadastro'); ?>">CADASTRO</a>
<form action="<?php echo ROOT; ?>/login" method="post">
	<input type="text" name="login">
    <input type="password" name="pass">
    <input type="submit" value="ok">
</form>-->
<?php 
	if(isset($_SESSION['warn'])):
		echo $_SESSION['warn'];
		unset($_SESSION['warn']);
	endif;
?>
<?php Footer(); ?>