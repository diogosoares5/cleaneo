<?php 
include('view/template.php'); 
Head('Cadastro',array('<script src="'.ROOT.'/assets/js/jquery.validate.js"></script>'),'etapa1');
$category = '';
?>
			
			<div class="top"><img src="<?php echo ROOT; ?>/assets/images/topBar.png" alt="" title="" width="551" height="23" /></div>
			<div class="title"><img src="<?php echo ROOT; ?>/assets/images/txt_facaseucadastro.png" width="295" height="26" alt="" title="" /></div>
			<div class="top"><img src="<?php echo ROOT; ?>/assets/images/bar2.png" alt="" title="" width="551" height="2" /></div>
			
<div class="Bcrumb">			
<?php 
if(isset($_GET['c'])):
	$category = $_GET['c'];
	if($category == 'arquiteto'): $cat = 1; else: $cat = 2; endif;
echo '<a href="'.HHtml::Link('cadastro').'">Categoria</a> ';
echo $category;

?>
Selecione o tipo de cadastro:
<input type="radio" class="signSel" name="signSel" value="1" id="signSel1" /><label for="signSel1">Pessoa Fisica</label>
<input type="radio" class="signSel" name="signSel" value="2" id="signSel2" /><label for="signSel2">Pessoa Juridica</label>
</div>
<?php
else:
?>
<p>Em qual categoria deseja concorrer?</p>
			<a href="<?php echo HHtml::Link('cadastro/arquiteto'); ?>" class="lf"><img src="<?php echo ROOT; ?>/assets/images/btArqt.png" alt="" title="" width="264" height="45" /></a>
			<a href="<?php echo HHtml::Link('cadastro/instalador'); ?>" class="rt"><img src="<?php echo ROOT; ?>/assets/images/btInst.png" alt="" title="" width="264" height="45" /></a>	
            <div class="Boxer">
            	<h2 class="title"><img src="<?php echo ROOT; ?>/assets/images/txt_atencao.png" alt="" title="" width="123" height="34" /></h2>
            	<ul class="list">
            		<li>Só serão aceitos projetos e obras que foram <b>executadas exclusivamente</b> com o sistema Knauf Cleaneo Acústico. </li>
            		<li>As obras e projetos inscritos devem ter sido executadas a partir de <b>janeiro de 2010 e integralmente concluídas até 04 de junho de 2013.</b></li>
					<li>Podem participar do concurso pessoas físicas e jurídicas, nas duas categorias acima: Arquiteto – devidamente registrado no CAU – e Instaladores de sistema Drywall. </li>	
					<li>Os participantes são responsáveis exclusivos pela manutenção das informações cadastradas no site do concurso.</li>	
					<li>Qualquer projeto ou obra que não cumpra, de maneira válida, qualquer dos requisitos para inscrição será excluído do concurso sem aviso prévio.</li>	
            	</ul>
            </div> 			
<?php
endif;
if(isset($_SESSION['warn'])):
	echo $_SESSION['warn'];
	unset($_SESSION['warn']);
endif;
?>
<div id="box_cadastro_fisica" style="display:none;">

<?php HForm::Init(ROOT.'/verify','post','formCadastroFisica','form'); ?>
<?php HForm::Input('cat','hidden','','',$cat); ?>
<?php HForm::Input('pessoa','hidden','','',1); ?>
<span class="clr"></span>
<hr class="bdr1" />
<span class="infoBar">Todos os campos são de preenchimento obrigatório.</span>
				
<span class="lbl">
<?php HForm::Label('E-mail:','email'); ?>
<?php HForm::Input('email','text','email','inpt04'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Senha:','pass'); ?>
<?php HForm::Input('pass','password','pass','inpt04'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Confirma&ccedil;&atilde;o de senha:','repass'); ?>
<?php HForm::Input('repass','password','repass','inpt04'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Nome Completo:','nome'); ?>
<?php HForm::Input('nome','text','nome','inpt05'); ?>
</span>
<span class="lbl">
<?php HForm::Label('CPF:','cpf'); ?>
<?php HForm::Input('cpf','text','cpf','inpt04'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Profiss&atilde;o:','profissao'); ?>
<?php HForm::Input('profissao','text','profissao','inpt04'); ?>
</span>
<span class="lbl">
<?php HForm::Label('CEP:','cep'); ?>
<?php HForm::Input('cep','text','cep','inpt03'); ?>
<span class="link_ipt"><a href="#"><img width="9" height="11" title="" alt="" src="<?php echo ROOT; ?>/assets/images/seta1.png"> Não sei meu CEP</a></span>
</span>
<span class="lbl">
<?php HForm::Label('Endere&ccedil;o:','endereco'); ?>
<?php HForm::Input('endereco','text','endereco','inpt05'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Complemento:','complemento'); ?>
<?php HForm::Input('complemento','text','complemento','inpt04'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Bairro:','bairro'); ?>
<?php HForm::Input('bairro','text','bairro','inpt04'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Cidade:','cidade'); ?>
<?php HForm::Input('cidade','text','cidade','inpt04'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Estado:','estado'); ?>
<div class="styled-select">
<?php HForm::Select('estado',array("RJ"=>"Rio de janeiro","SP"=>"S&atilde;o Paulo"),'Selecione Estado','','inpt04Slc'); ?>
</div>
</span>
<span class="lbl">
<?php HForm::Label('Telefone Fixo:','tel'); ?>
<?php HForm::Input('dddtel','text','dddtel','inpt01'); ?>
<?php HForm::Input('tel','text','tel','inpt02'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Telefone Celular:','cel'); ?>
<?php HForm::Input('dddcel','text','dddcel','inpt01'); ?>
<?php HForm::Input('cel','text','cel','inpt02'); ?>
</span>
<span class="lbl">
<?php HForm::Button('submit','','','btEnviar rt'); ?>
</span>
<?php HForm::End(); ?>
</div>
<div id="box_cadastro_juridica" class="cadastro" style="display:none;">
<?php HForm::Init(ROOT.'/verify','post','formCadastroJuridica','form'); ?>
<?php HForm::Input('cat','hidden','','',$cat); ?>
<?php HForm::Input('pessoa','hidden','','',2); ?>
<span class="clr"></span>
<hr class="bdr1" />
<span class="infoBar">Todos os campos são de preenchimento obrigatório.</span>
				
<span class="lbl">
<?php HForm::Label('Email','email'); ?>
<?php HForm::Input('email','text','email','inpt04'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Senha','pass'); ?>
<?php HForm::Input('pass','password','pass','inpt04'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Confirmação de senha','repass'); ?>
<?php HForm::Input('repass','password','repass','inpt04'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Raz&atilde;o Social','razao'); ?>
<?php HForm::Input('razao','text','razao','inpt05'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Nome Fantasia','fantasia'); ?>
<?php HForm::Input('fantasia','text','fantasia','inpt05'); ?>
</span>
<span class="lbl">
<?php HForm::Label('CNPJ','cnpj'); ?>
<?php HForm::Input('cnpj','text','cnpj','inpt04'); ?>
</span>
<span class="lbl">
<?php HForm::Label('CEP','cep'); ?>
<?php HForm::Input('cep','text','cep','inpt03'); ?>
<span class="link_ipt"><a href="#"><img width="9" height="11" title="" alt="" src="<?php echo ROOT; ?>/assets/images/seta1.png"> Não sei meu CEP</a></span>
</span>
<span class="lbl">
<?php HForm::Label('Endere&ccedil;o Comercial','endereco'); ?>
<?php HForm::Input('endereco','text','endereco','inpt05'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Complemento','complemento'); ?>
<?php HForm::Input('complemento','text','complemento','inpt04'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Bairro','bairro'); ?>
<?php HForm::Input('bairro','text','bairro','inpt04'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Cidade','cidade'); ?>
<?php HForm::Input('cidade','text','cidade','inpt04'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Estado','estado'); ?>
<div class="styled-select">
<?php HForm::Select('estado',array("Rio de janeiro"=>"Rio de janeiro","S&atilde;o Paulo"=>"S&atilde;o Paulo"),'Selecione Estado','','inpt04Slc'); ?>
</div>
</span>
<span class="lbl">
<?php HForm::Label('Telefone Fixo','tel'); ?>
<?php HForm::Input('dddtel','text','dddtel','inpt01'); ?>
<?php HForm::Input('tel','text','tel','inpt02'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Telefone celular','cel'); ?>
<?php HForm::Input('dddcel','text','dddcel','inpt01'); ?>
<?php HForm::Input('cel','text','cel','inpt02'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Nome completo do proprietário da empresa','nome','lbl2'); ?>
<?php HForm::Input('nome','text','nome','inpt05'); ?>
</span>
<span class="lbl">
<?php HForm::Label('CPF do propiet&aacute;rio','cpf'); ?>
<?php HForm::Input('cpf','text','cpf','inpt05'); ?>
</p>
<span class="lbl">
<?php HForm::Button('submit','','','btEnviar rt'); ?>
</span>
<?php HForm::End(); ?>
</div>
<?php Footer(); ?>