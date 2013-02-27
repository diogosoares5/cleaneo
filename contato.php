<?php 
include('view/template.php'); 
Head('Fale Conosco','','faleConosco');
?>
			<div class="top"><img src="<?php echo ROOT; ?>/assets/images/topBar.png" alt="" title="" width="551" height="23" /></div>
			<div class="title"><img src="<?php echo ROOT; ?>/assets/images/txt_faleC.png" width="222" height="19" alt="" title="" /></div>
			<div class="top"><img src="<?php echo ROOT; ?>/assets/images/bar2.png" alt="" title="" width="551" height="2" /></div>
			<form action="<?php echo ROOT; ?>/response" id="contactForm" method="post" class="form">
				<span class="infoBar"><b>Tem alguma dúvida?</b> Entre em contato.</span>
				<span class="lbl">
					<label>Nome completo:</label>
					<input type="text" title="Nome completo:" id="nome" name="nome"  class="inpt05" />
				</span>	
				<span class="lbl">
					<label>E-mail: </label>
					<input type="text" title="E-mail" name="email" id="email"  class="inpt04" />
				</span>
				<span class="lbl">
					<label>Telefone celular: </label>
					<input type="text" title="ddd" name="ddd_tel" id="ddd_tel"  class="inpt01" /><input type="text" name="tel" id="tel" title="Telefone celular:"  class="inpt02" />
				</span>	
				<span class="lbl">
					<label>Mensagem: </label>
					<textarea class="inpt05tArea" type="text" name="msg" id="msg" title="Mensagem" ></textarea>
				</span>					
				<input type="submit" value=" " name="" id="" class="btEnviar rt" />	
				<a href="mailto:sac@knauf.com.br"><img src="<?php echo ROOT; ?>/assets/images/img_sac.png" alt="" title="" width="551" height="118" /></a>
			</form>
<?php Footer(); ?>