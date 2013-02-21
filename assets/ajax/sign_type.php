<?php
require("../../config.php");
include_once("../../components/function.php");
include_once("../../behavior/utils.php");
$cat = $_POST['cat'];
if(isset($_POST['value']) and $_POST['value'] == 1):

//pessoa fisica
?>
<?php HForm::Init(ROOT.'/verify','post','formCadastro','form'); ?>
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
<?php HForm::Input('cep','text','cep'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Endere&ccedil;o:','endereco'); ?>
<?php HForm::Input('endereco','text','endereco'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Complemento:','complemento'); ?>
<?php HForm::Input('complemento','text','complemento'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Bairro:','bairro'); ?>
<?php HForm::Input('bairro','text','bairro'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Cidade:','cidade'); ?>
<?php HForm::Input('cidade','text','cidade'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Estado:','estado'); ?>
<?php HForm::Select('estado',array("RJ"=>"Rio de janeiro","SP"=>"S&atilde;o Paulo"),'Selecione Estado'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Telefone Fixo:','tel'); ?>
<?php HForm::Input('dddtel','text','dddtel'); ?>
<?php HForm::Input('tel','text','tel'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Telefone Celular:','cel'); ?>
<?php HForm::Input('dddcel','text','dddcel'); ?>
<?php HForm::Input('cel','text','cel'); ?>
</span>
<span class="lbl">
<?php HForm::Button('submit','ENVIAR'); ?>
</span>
<?php HForm::End(); ?>

<?php else:
//pessoa juridica
?>
<?php HForm::Init(ROOT.'/verify','post','formCadastro','form'); ?>
<?php HForm::Input('cat','hidden','','',$cat); ?>
<?php HForm::Input('pessoa','hidden','','',2); ?>
<span class="clr"></span>
				<hr class="bdr1" />
				<span class="infoBar">Todos os campos são de preenchimento obrigatório.</span>
				
<span class="lbl">
<?php HForm::Label('Email','email'); ?>
<?php HForm::Input('email','text','email'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Senha','pass'); ?>
<?php HForm::Input('pass','password','pass'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Confere senha','repass'); ?>
<?php HForm::Input('repass','password','repass'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Raz&atilde;o Social','razao'); ?>
<?php HForm::Input('razao','text','razao'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Nome Fantasia','fantasia'); ?>
<?php HForm::Input('fantasia','text','fantasia'); ?>
</span>
<span class="lbl">
<?php HForm::Label('CNPJ','cnpj'); ?>
<?php HForm::Input('cnpj','text','cnpj'); ?>
</span>
<span class="lbl">
<?php HForm::Label('CEP','cep'); ?>
<?php HForm::Input('cep','text','cep'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Endere&ccedil;o Comercial','endereco'); ?>
<?php HForm::Input('endereco','text','endereco'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Complemento','complemento'); ?>
<?php HForm::Input('complemento','text','complemento'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Bairro','bairro'); ?>
<?php HForm::Input('bairro','text','bairro'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Cidade','cidade'); ?>
<?php HForm::Input('cidade','text','cidade'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Estado','estado'); ?>
<?php HForm::Select('estado',array("Rio de janeiro"=>"Rio de janeiro","S&atilde;o Paulo"=>"S&atilde;o Paulo"),'Selecione Estado'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Telefone Fixo','tel'); ?>
<?php HForm::Input('dddtel','text','dddtel'); ?>
<?php HForm::Input('tel','text','tel'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Telefone celular','cel'); ?>
<?php HForm::Input('dddcel','text','dddcel'); ?>
<?php HForm::Input('cel','text','cel'); ?>
</span>
<span class="lbl">
<?php HForm::Label('Nome do propiet&aacute;rio da empresa','nome'); ?>
<?php HForm::Input('nome','text','nome'); ?>
</span>
<span class="lbl">
<?php HForm::Label('CPF do propiet&aacute;rio','cpf'); ?>
<?php HForm::Input('cpf','text','cpf'); ?>
</p>
<span class="lbl">
<?php HForm::Button('submit','ENVIAR'); ?>
</span>
<?php HForm::End(); ?>

<?php
endif;
?>
