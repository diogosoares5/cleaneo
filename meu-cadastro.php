<?php 
include('view/template.php'); 
require_once("controller/customerController.php");

Head('Meu cadastro','','etapa1');
//cliente
$customer = new Customer();
$checked = $customer->checkAuth();
$customer->set($checked);

?><div class="top"><img src="<?php echo ROOT; ?>/assets/images/topBar.png" alt="" title="" width="551" height="23" /></div>
			<div class="title"><img src="<?php echo ROOT; ?>/assets/images/txt_facaseucadastro.png" width="295" height="26" alt="" title="" /></div>
			<div class="top"><img src="<?php echo ROOT; ?>/assets/images/bar2.png" alt="" title="" width="551" height="2" /></div>

<div class="Bcrumb">
				<span>Ol&aacute; <?php echo $customer->nome; ?> |</span> <a href="<?php echo ROOT; ?>/projetos">Meus Projetos |</a> <span>Meu Cadastro |</span> <a href="<?php echo ROOT; ?>/login?out=1"> Logout</a>
			</div>
<div id="box_cadastro_fisica">

<?php HForm::Init(ROOT.'/verify','post','formCadastroFisica','form'); ?>

<span class="clr"></span>
<hr class="bdr1" />
<span class="infoBar">
<?php
if(isset($_SESSION['warn'])):
	echo $_SESSION['warn'];
	unset($_SESSION['warn']);
else:
echo 'Todos os campos são de preenchimento obrigatório.';
endif;
?>
</span>
				
<span class="lbl">
<?php HForm::Label('E-mail:','email'); ?>
<?php HForm::Input('email','text','email','inpt04',$customer->email); ?>
</span>

<span class="lbl">
<?php HForm::Label('Nome Completo:','nome'); ?>
<?php HForm::Input('nome','text','nome','inpt05',$customer->nome); ?>
</span>
<span class="lbl">
<?php HForm::Label('CPF:','cpf'); ?>
<?php HForm::Input('cpf','text','cpf','inpt04',$customer->getField('cpf')); ?>
</span>
<span class="lbl">
<?php HForm::Label('Profiss&atilde;o:','profissao'); ?>
<?php HForm::Input('profissao','text','profissao','inpt04',$customer->getField('profissao')); ?>
</span>
<span class="lbl">
<?php HForm::Label('CEP:','cep'); ?>
<?php HForm::Input('cep','text','cep','inpt03',$customer->getField('cep')); ?>
<span class="link_ipt"><a href="#"><img width="9" height="11" title="" alt="" src="<?php echo ROOT; ?>/assets/images/seta1.png"> Não sei meu CEP</a></span>
</span>
<span class="lbl">
<?php HForm::Label('Endere&ccedil;o:','endereco'); ?>
<?php HForm::Input('endereco','text','endereco','inpt05',$customer->getField('endereco')); ?>
</span>
<span class="lbl">
<?php HForm::Label('Complemento:','complemento'); ?>
<?php HForm::Input('complemento','text','complemento','inpt04',$customer->getField('complemento')); ?>
</span>
<span class="lbl">
<?php HForm::Label('Bairro:','bairro'); ?>
<?php HForm::Input('bairro','text','bairro','inpt04',$customer->getField('bairro')); ?>
</span>
<span class="lbl">
<?php HForm::Label('Cidade:','cidade'); ?>
<?php HForm::Input('cidade','text','cidade','inpt04',$customer->getField('cidade')); ?>
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

</div><?php Footer(); ?>