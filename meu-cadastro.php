<?php 
include('view/template.php'); 
require_once("controller/customerController.php");

Head('Meu cadastro','','etapa1');


//cliente
$customer = new Customer();
$checked = $customer->checkAuth();
$customer->set($checked);

if(isset($_POST['id_customer'])): 
$id_customer = $_POST['id_customer']; 
//customers params
$email = $_POST['email']; 
$nome = $_POST['nome']; 
$cpf = $_POST['cpf']; 
if(isset($_POST['profissao'])): $profissao = $_POST['profissao']; else: $profissao =  NULL; endif;  //só existe em fisica
$cep = $_POST['cep']; 
$endereco = $_POST['endereco']; 
$complemento = $_POST['complemento']; 
$bairro = $_POST['bairro']; 
$cidade = $_POST['cidade']; 
$estado = $_POST['estado']; 
$ddd_tel = $_POST['ddd_tel'];
$ddd_cel = $_POST['ddd_cel'];
$tel = $_POST['tel']; 
$cel = $_POST['cel']; 

$edit = $customer->Edit(array('nome="'.$nome.'", email="'.$email.'", cpf="'.$cpf.'", profissao="'.$profissao.'", cep="'.$cep.'", endereco="'.$endereco.'", complemento="'.$complemento.'", bairro="'.$bairro.'", cidade="'.$cidade.'", estado="'.$estado.'", ddd_cel="'.$ddd_cel.'", cel="'.$cel.'", ddd_tel="'.$ddd_tel.'", tel="'.$tel.'" WHERE id="'.$id_customer.'" '));
if($edit==true):
	$_SESSION['warn'] = "Editado com sucesso";
else:
	$_SESSION['warn'] = "Erro ao editar";
endif;

else: 

$id_customer = NULL;

endif;

?><div class="top"><img src="<?php echo ROOT; ?>/assets/images/topBar.png" alt="" title="" width="551" height="23" /></div>
			<div class="title"><img src="<?php echo ROOT; ?>/assets/images/txt_facaseucadastro.png" width="295" height="26" alt="" title="" /></div>
			<div class="top"><img src="<?php echo ROOT; ?>/assets/images/bar2.png" alt="" title="" width="551" height="2" /></div>

<div class="Bcrumb">
				<span>Ol&aacute; <?php echo $customer->nome; ?> |</span> <a href="<?php echo ROOT; ?>/projetos">Meus Projetos |</a> <span>Meu Cadastro |</span> <a href="<?php echo ROOT; ?>/login?out=1"> Logout</a>
			</div>
<div id="box_cadastro_fisica">

<?php HForm::Init(ROOT.'/meu-cadastro','post','formMeuCadastro','form'); ?>
<?php HForm::Input('id_customer','hidden','id_customer','',$customer->id); ?>
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
<span class="link_ipt"><a href="http://www.buscacep.correios.com.br/" target="_blank"><img width="9" height="11" title="" alt="" src="<?php echo ROOT; ?>/assets/images/seta1.png"> Não sei meu CEP</a></span>
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
<select name="estado" id="estado" class="inpt04Slc">
<?php HForm::ComboEstados($customer->getField('estado')); ?>
</select>
</div>
</span>
<span class="lbl">
<?php HForm::Label('Telefone Fixo:','tel'); ?>
<?php HForm::Input('ddd_tel','text','ddd_tel','inpt01',$customer->getField('ddd_tel')); ?>
<?php HForm::Input('tel','text','tel','inpt02',$customer->getField('tel')); ?>
</span>
<span class="lbl">
<?php HForm::Label('Telefone Celular:','cel'); ?>
<?php HForm::Input('ddd_cel','text','ddd_cel','inpt01',$customer->getField('ddd_cel')); ?>
<?php HForm::Input('cel','text','cel','inpt02',$customer->getField('cel')); ?>
</span>
<span class="lbl">
<?php HForm::Button('submit','','','btEnviar rt'); ?>
</span>
<?php HForm::End(); ?>

</div><?php Footer(); ?>