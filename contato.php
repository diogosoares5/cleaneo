<?php 
include('view/template.php'); 
Head();
?>
			<div class="top"><img src="<?php echo ROOT; ?>/assets/images/topBar.png" alt="" title="" width="551" height="23" /></div>
			<div class="title"><img src="<?php echo ROOT; ?>/assets/images/txt_faleC.png" width="222" height="19" alt="" title="" /></div>
			<div class="top"><img src="<?php echo ROOT; ?>/assets/images/bar2.png" alt="" title="" width="551" height="2" /></div>
<form action="#" method="#" class="form">
				<span class="infoBar"><b>Tem alguma dúvida?</b> Entre em contato.</span>
				<span class="lbl">
					<label>Nome completo:</label>
					<input type="text" title="Nome completo:"  class="inpt05 errorInpt" />
					<span class="error"><b>X</b> Favor digitar bla bla bla</span>
				</span>	
				<span class="lbl">
					<label>E-mail: </label>
					<input type="text" title="E-mail"  class="inpt04" />
					<span class="error"><b>X</b> Favor digitar bla bla bla.</span>
				</span>
				<span class="lbl">
					<label>Telefone celular: </label>
					<input type="text" title="ddd"  class="inpt01" /><input type="text" title="Telefone celular:"  class="inpt02" /><span class="error"><b>X</b> Favor digitar bla bla bla</span>
				</span>	
				<span class="lbl">
					<label>Mensagem: </label>
					<textarea class="inpt05tArea errorInpt" type="text" title="Mensagem" ></textarea>
					<span class="error"><b>X</b> Favor digitar bla bla bla.</span>
				</span>					
				<input type="submit" value=" " name="" id="" class="btEnviar rt" />	
				<a href="mailto:sac@knauf.com.br"><img src="<?php echo ROOT; ?>/assets/images/img_sac.png" alt="" title="" width="551" height="118" /></a>
														
			</form>
<?php Footer(); ?>