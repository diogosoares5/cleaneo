<?php 
include('view/template.php'); 
Head('Cadastro');
$category = '';
?>
<h1>FAÇA SEU CADASTRO</h1>
<?php 
if(isset($_GET['c'])):
	$category = $_GET['c'];
echo '<a href="'.HHtml::Link('cadastro').'">Categoria</a> ';
echo $category;
if($category == 'arquiteto'): $cat = 1; else: $cat = 2; endif;
?>
Selecione o tipo de cadastro:
<input type="radio" class="signSel" name="signSel" value="1" id="signSel1" /><label for="signSel1">Pessoa Fisica</label>
<input type="radio" class="signSel" name="signSel" value="2" id="signSel2" /><label for="signSel2">Pessoa Juridica</label>
<input type="hidden" id="cat" value="<?php echo $cat; ?>" />
<?php
else:
?>
<a href="<?php echo HHtml::Link('cadastro/arquiteto'); ?>">ARQUITETO</a>
<a href="<?php echo HHtml::Link('cadastro/instalador'); ?>">INSTALADORRRRR</a>
<?php
endif;
?>
<div id="box_cadastro"></div>
<?php Footer(); ?>
